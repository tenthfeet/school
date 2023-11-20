<?php

namespace App\Http\Controllers\Master;

use App\Enums\BloodGroup;
use App\Enums\Gender;
use App\Enums\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Master\StudentRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Language;
use App\Models\ParentInfo;
use App\Models\State;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $languages = Language::where('is_active', 1)->get()->toArray();
        $countries = Country::where('is_active', 1)->get()->toArray();
        $states = State::where('is_active', 1)->get()->toArray();
        $city = City::where('is_active', 1)->get()->toArray();

        return $request->wantsJson()
            ? response()->json(['data' => Student::all()])
            : view('pages.master.student', [
                'languages' => $languages,
                'countries' => $countries,
                'states' => $states,
                'cities' => $city,
                'status' => Status::labelArray(),
                'gender' => Gender::labelArray(),
                'bloodGroup' => BloodGroup::labelArray(),
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $studentData = $request->safe((new Student())->getFillable());
            $parentData = $request->safe((new ParentInfo())->getFillable());

            if ($request->has('has_sibling')) {
                $sibling = Student::find($request->sibling_id);
                $parentInfo = $sibling->parent;
                $parentInfo->update($parentData);
            } else {
                $parentInfo = ParentInfo::create($parentData);
            }

            if ($request->hasFile('photo_path')) {
                $studentData['photo_path'] = $request->file('photo_path')->store(Student::PHOTOS_DIRECTORY);
            }

            $student = new Student($studentData);
            $parentInfo->students()->save($student);

            DB::commit();
            return response()->json([
                'item' => $student,
                'message' => [
                    'text' => "{$request->name} added successfully...",
                    'icon' => 'success'
                ]
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            return response()->json([
                'message' => [
                    'text' => "Could not add {$request->name}",
                    'icon' => 'error'
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): JsonResponse
    {
        $student->load('sibling:id,name');
        $parent = $this->getParentInfoData($student);
        return response()->json([
            'student' => $student,
            'cities' => $parent['cities']
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student)
    {
        try {
            DB::beginTransaction();
            $studentData = $request->only((new Student())->getFillable());
            $parentData = $request->only((new ParentInfo())->getFillable());

            if ($request->has('has_sibling')) {
                $sibling = Student::find($request->sibling_id);
                $parentInfo = $sibling->parent;
                $parentInfo->update($parentData);
            } elseif ($student->has_sibling == 1) {
                $parentInfo = ParentInfo::create($parentData);
            } else {
                $parentInfo = $student->parent;
                $parentInfo->update($parentData);
            }

            if (!$request->has('has_sibling')) {
                $studentData['has_sibling'] = 0;
                $studentData['sibling_id'] = null;
            }

            $oldPath = null;
            if ($request->hasFile('photo_path')) {
                $studentData['photo_path'] = $request->file('photo_path')->store(Student::PHOTOS_DIRECTORY);
                $oldPath = $student->photo_path;
            }

            $student->update($studentData);
            $student->parent()->associate($parentInfo);

            if ($oldPath) {
                Storage::delete($oldPath);
            }

            DB::commit();
            return response()->json([
                'item' => $student,
                'message' => [
                    'text' => "{$request->name} updated successfully...",
                    'icon' => 'success'
                ]
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            return response()->json([
                'message' => [
                    'text' => "Could not update {$request->name}",
                    'icon' => 'error'
                ]
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function autoComplete(Request $request): JsonResponse
    {
        $response = Student::select('id', 'name as text')
            ->where('name', 'like', "%{$request->term}%")
            ->orWhere('id_no', 'like', "%{$request->term}%")
            ->get();
        return response()->json($response);
    }

    public function getParentInfo(Student $student): JsonResponse
    {
        return response()->json($this->getParentInfoData($student));
    }

    public function getParentInfoData(Student $student): array
    {
        $parent = $student->parent;
        $cities = City::where('state_id', $parent->state_id)->get(['id', 'name as text']);
        return [
            'parent' => $parent,
            'cities' => $cities
        ];
    }
}
