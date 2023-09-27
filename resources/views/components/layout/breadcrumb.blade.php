@props(['title', 'links'])
<div class="container-fluid d-flex justify-content-between">
    <span>{{ $title }}</span>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-0 ms-2">
            @foreach ($links as $name => $link)
                <li class="breadcrumb-item">
                    <a href="{{ $link }}">{{ $name }}</a>
                </li>
            @endforeach
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>
</div>
