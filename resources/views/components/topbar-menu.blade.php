<div class="main-menu">
    <ul>
        <li class="menu-item-has-children">
            <!--  Single menu -->
            <!-- has dropdown -->
            <a href="javascript:void()">
                <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                    <span class="icon-box">
                        <iconify-icon icon=heroicons-outline:home>
                        </iconify-icon>
                    </span>
                    <div class="text-box"> {{ __('Dashboard') }}
                    </div>
                </div>
                <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
                    <iconify-icon icon="heroicons-outline:chevron-down">
                    </iconify-icon>
                </div>
            </a>
            <!-- Dropdown menu -->
            <ul class="sub-menu">
            </ul>
            <!-- Megamenu -->
        </li>
        <li class="
                 menu-item-has-children has-megamenu
                 ">
            <!--  Single menu -->
            <!-- has dropdown -->
            <a href="javascript:void()">
                <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                    <span class="icon-box">
                        <iconify-icon icon=heroicons-outline:view-boards>
                        </iconify-icon>
                    </span>
                    <div class="text-box">{{ __('Masters') }}
                    </div>
                </div>
                <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
                    <iconify-icon icon="heroicons-outline:chevron-down">
                    </iconify-icon>
                </div>
            </a>
            <!-- Dropdown menu -->
            <!-- Megamenu -->
            <div class="rt-mega-menu">
                <div class="flex flex-wrap space-x-8 justify-between rtl:space-x-reverse">
                    <div>
                        <!-- mega menu title -->
                        <div
                            class="text-sm font-medium text-slate-900 dark:text-white mb-2 flex space-x-1 items-center">
                            <span>{{ __('Teacher') }}</span>
                        </div>
                        <!-- single menu item* -->
                        <a href=class-periods>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">{{ __('Class Period') }}
                                </span>
                            </div>
                        </a>
                        <a href=class-rooms>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">{{ __('Class Room') }}
                                </span>
                            </div>
                        </a>
                        <a href=teacher-mappings>
                          <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                  class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                              </span>
                              <span class="capitalize text-slate-600 dark:text-slate-300">{{ __('Teacher Mapping') }}
                              </span>
                          </div>
                      </a>
                      <a href=subject-mappings>
                        <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                            <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                            </span>
                            <span class="capitalize text-slate-600 dark:text-slate-300">{{ __('Subject Mapping') }}
                            </span>
                        </div>
                    </a>
                    <a href=subjects>
                      <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                          <span
                              class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                          </span>
                          <span class="capitalize text-slate-600 dark:text-slate-300">
                              {{ __('Subject') }}
                          </span>
                      </div>
                  </a>
                  <a href=terms>
                    <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                        <span
                            class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                        </span>
                        <span class="capitalize text-slate-600 dark:text-slate-300">
                            {{ __('Term') }}
                        </span>
                    </div>
                </a>
                    </div>
                    <div>
                        <!-- mega menu title -->
                        <div
                            class="text-sm font-medium text-slate-900 dark:text-white mb-2 flex space-x-1 items-center">
                            <span> {{ __('Fee') }}
                            </span>
                        </div>
                        <!-- single menu item* -->
                        <a href=fee-details>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">{{ __('Fee Details') }}
                                </span>
                            </div>
                        </a>
                        <a href=fee-dues>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Fee Due') }}
                                </span>
                            </div>
                        </a>
                        <a href=fee-transactions>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Fee Transaction') }}
                                </span>
                            </div>
                        </a>
                        <a href=fees>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Fee') }}
                                </span>
                            </div>
                        </a>
                        <a href=financial-years>
                          <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                  class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                              </span>
                              <span class="capitalize text-slate-600 dark:text-slate-300">
                                  {{ __('Financial Years') }}
                              </span>
                          </div>
                      </a>
                        <a href=fee-bundles>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Fee Bundle') }}
                                </span>
                            </div>
                        </a>
                    </div>

                    <div>
                        <!-- mega menu title -->
                        <div
                            class="text-sm font-medium text-slate-900 dark:text-white mb-2 flex space-x-1 items-center">
                            <span> {{ __('Student Details') }}
                            </span>
                        </div>
                        <!-- single menu item* -->
                        <a href=attendances>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Attendance') }}
                                </span>
                            </div>
                        </a>
                        <a href=academic-standards>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Academic Standards') }}
                                </span>
                            </div>
                        </a>
                        <a href=academic-years>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Academic Year') }}
                                </span>
                            </div>
                        </a>
                        <a href=class-periods>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Class Period') }}
                                </span>
                            </div>
                        </a>
                        <a href=students>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Student') }}
                                </span>
                            </div>
                        </a>
                        <a href=medium-of-studies>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Medium of Study') }}
                                </span>
                            </div>
                        </a>
                        <a href=departments>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Department') }}
                                </span>
                            </div>
                        </a>
                        <a href=homeworks>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Home Work') }}
                                </span>
                            </div>
                        </a>
                        <a href=statuses>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Status') }}
                                </span>
                            </div>
                        </a>
                        <a href=languages>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Language') }}
                                </span>
                            </div>
                        </a>
                    </div>
                    <div>
                        <!-- mega menu title -->
                        <div
                            class="text-sm font-medium text-slate-900 dark:text-white mb-2 flex space-x-1 items-center">
                            <span> {{ __('Exam And Others') }}
                            </span>
                        </div>
                        <!-- single menu item* -->
                        <a href=marks>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Mark') }}
                                </span>
                            </div>
                        </a>
                        <a href=grades>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Grade') }}
                                </span>
                            </div>
                        </a>
                        <a href=exams>
                          <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                  class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                              </span>
                              <span class="capitalize text-slate-600 dark:text-slate-300">
                                  {{ __('Exam') }}
                              </span>
                          </div>
                      </a>
                        <a href=exam-categories>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Exam Categories') }}
                                </span>
                            </div>
                        </a>
                        <a href=permission-groups>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Permission Group') }}
                                </span>
                            </div>
                        </a>
                        <a href=permissions>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Permission') }}
                                </span>
                            </div>
                        </a>
                        <a href=roles>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('Role') }}
                                </span>
                            </div>
                        </a>
                        <a href=users>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('User') }}
                                </span>
                            </div>
                        </a>
                        <a href=states>
                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                                <span
                                    class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                                </span>
                                <span class="capitalize text-slate-600 dark:text-slate-300">
                                    {{ __('State') }}
                                </span>
                            </div>
                        </a>
                        <a href=cities>
                          <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                  class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                              </span>
                              <span class="capitalize text-slate-600 dark:text-slate-300">
                                  {{ __('City') }}
                              </span>
                          </div>
                      </a>
                      <a href=countries>
                        <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                            <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none">
                            </span>
                            <span class="capitalize text-slate-600 dark:text-slate-300">
                                {{ __('Country') }}
                            </span>
                        </div>
                    </a>
                    
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
<!-- end top menu -->
