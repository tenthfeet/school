<div class="main-menu">
    <ul>
      <li class="menu-item-has-children">
        <!--  Single menu -->
        <!-- has dropdown -->
        <a href="javascript:void()">
          <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
            <span class="icon-box">
              <iconify-icon icon=heroicons-outline:home >
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
          <li>
            <a href=index.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons:presentation-chart-line class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                   {{ __('Analytics Dashboard') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=ecommerce-dashboard.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons:shopping-cart class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Ecommerce Dashboard') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=project-dashboard.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons:briefcase class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                    {{ __('Project Dashboard') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=crm-dashboard.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=ri:customer-service-2-fill class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('CRM Dashboard') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=banking-dashboard.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons:wrench-screwdriver class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Banking Dashboard') }}
                </span>
              </div>
            </a>
          </li>
        </ul>
        <!-- Megamenu -->
      </li>
      <li class="menu-item-has-children">
        <!--  Single menu -->
        <!-- has dropdown -->
        <a href="javascript:void()">
          <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
            <span class="icon-box">
              <iconify-icon icon=heroicons-outline:chip >
              </iconify-icon>
            </span>
            <div class="text-box">{{ __('App') }}
            </div>
          </div>
          <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
            <iconify-icon icon="heroicons-outline:chevron-down">
            </iconify-icon>
          </div>
        </a>
        <!-- Dropdown menu -->
        <ul class="sub-menu">
          <li>
            <a href=chat.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons-outline:chat class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Chat') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=email.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons-outline:mail class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Email') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=calender>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons-outline:calendar class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Calander') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=kanban>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons-outline:view-boards class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Kanban') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=todo>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons-outline:clipboard-check class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Todo') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=projects>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons-outline:document class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Projects') }}
                </span>
              </div>
            </a>
          </li>
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
              <iconify-icon icon=heroicons-outline:view-boards >
              </iconify-icon>
            </span>
            <div class="text-box">{{ __('Pages') }}
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
              <div class="text-sm font-medium text-slate-900 dark:text-white mb-2 flex space-x-1 items-center">
                <span>{{ __('Authentication') }}</span>
              </div>
              <!-- single menu item* -->
              <a href=signin-one.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Signin One') }}
                  </span>
                </div>
              </a>
              <a href=signin-two.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Signin Two') }}
                  </span>
                </div>
              </a>
              <a href=signin-three.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Signin Three') }}
                  </span>
                </div>
              </a>
              <a href=signup-one.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Signup One') }}
                  </span>
                </div>
              </a>
              <a href=signup-two.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Signin Two') }}
                  </span>
                </div>
              </a>
              <a href=signup-three.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Signup Three') }}
                  </span>
                </div>
              </a>
              <a href=forget-password-one.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Forget Password One') }}
                  </span>
                </div>
              </a>
              <a href=forget-password-two.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Forget Password Two') }}
                  </span>
                </div>
              </a>
              <a href=forget-password-three.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Forget Password Three') }}
                  </span>
                </div>
              </a>
              <a href=lock-screen-one.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Lock Screen One') }}
                  </span>
                </div>
              </a>
              <a href=lock-screen-two.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Lock Screen Two') }}
                  </span>
                </div>
              </a>
              <a href=lock-screen-three.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Lock Screen Three') }}
                  </span>
                </div>
              </a>
            </div>
            <div>
              <!-- mega menu title -->
              <div class="text-sm font-medium text-slate-900 dark:text-white mb-2 flex space-x-1 items-center">
                <span> {{ __('Components') }}
                </span>
              </div>
              <!-- single menu item* -->
              <a href=typography.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Typography') }}
                  </span>
                </div>
              </a>
              <a href=colors.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Colors') }}
                  </span>
                </div>
              </a>
              <a href=alert.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Alert') }}
                  </span>
                </div>
              </a>
              <a href=button.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Button') }}
                  </span>
                </div>
              </a>
              <a href=card.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Card') }}
                  </span>
                </div>
              </a>
              <a href=carousel.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Carousel') }}
                  </span>
                </div>
              </a>
              <a href=dropdown.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Dropdown') }}
                  </span>
                </div>
              </a>
              <a href=image.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Image') }}
                  </span>
                </div>
              </a>
              <a href=modal.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Modal') }}
                  </span>
                </div>
              </a>
              <a href=progress-bar.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >{{ __('Progress Bar') }}
                  </span>
                </div>
              </a>
              <a href=placeholder.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Placeholder') }}
                  </span>
                </div>
              </a>
              <a href=tab-accordion.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Tab &amp; Accordion') }}
                  </span>
                </div>
              </a>
            </div>
            <div>
              <!-- mega menu title -->
              <div class="text-sm font-medium text-slate-900 dark:text-white mb-2 flex space-x-1 items-center">
                <span> {{ __('Forms') }}
                </span>
              </div>
              <!-- single menu item* -->
              <a href=input.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Input') }}
                  </span>
                </div>
              </a>
              <a href=input-group.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Input Group') }}
                  </span>
                </div>
              </a>
              <a href=input-layout.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Input Layout') }}
                  </span>
                </div>
              </a>
              <a href=form-validation.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Form Validation') }}
                  </span>
                </div>
              </a>
              <a href=form-wizard.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Wizard') }}
                  </span>
                </div>
              </a>
              <a href=input-mask.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Input Mask') }}
                  </span>
                </div>
              </a>
              <a href=file-input>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('File Input') }}
                  </span>
                </div>
              </a>
              <a href=form-repeater.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Form Repeater') }}
                  </span>
                </div>
              </a>
              <a href=textarea.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Textarea') }}
                  </span>
                </div>
              </a>
              <a href=checkbox.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Checkbox') }}
                  </span>
                </div>
              </a>
              <a href=radio-button.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Radion Button') }}
                  </span>
                </div>
              </a>
              <a href=switch.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Switch') }}
                  </span>
                </div>
              </a>
            </div>
            <div>
              <!-- mega menu title -->
              <div class="text-sm font-medium text-slate-900 dark:text-white mb-2 flex space-x-1 items-center">
                <span> {{ __('Utility') }}
                </span>
              </div>
              <!-- single menu item* -->
              <a href=invoice.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Invoice') }}
                  </span>
                </div>
              </a>
              <a href=pricing.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Pricing') }}
                  </span>
                </div>
              </a>
              <a href=faq.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('FAQ') }}
                  </span>
                </div>
              </a>
              <a href=blank-page.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Blank Page') }}
                  </span>
                </div>
              </a>
              <a href=blog.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Blog') }}
                  </span>
                </div>
              </a>
              <a href=404.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('404 Page') }}
                  </span>
                </div>
              </a>
              <a href=comming-soon.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Coming Soon') }}
                  </span>
                </div>
              </a>
              <a href=under-maintanance.html>
                <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                  <span
                        class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                        >
                  </span>
                  <span
                        class="capitalize text-slate-600 dark:text-slate-300"
                        >
                    {{ __('Under Maintanance Page') }}
                  </span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </li>
      <li class="menu-item-has-children">
        <!--  Single menu -->
        <!-- has dropdown -->
        <a href="javascript:void()">
          <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
            <span class="icon-box">
              <iconify-icon icon=heroicons-outline:view-grid-add >
              </iconify-icon>
            </span>
            <div class="text-box">{{ __('Widgets') }}
            </div>
          </div>
          <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
            <iconify-icon icon="heroicons-outline:chevron-down">
            </iconify-icon>
          </div>
        </a>
        <!-- Dropdown menu -->
        <ul class="sub-menu">
          <li>
            <a href=basic-widgets.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons-outline:document-text class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Basic') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=statistics-widgets.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons-outline:document-text class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Statistic') }}
                </span>
              </div>
            </a>
          </li>
        </ul>
        <!-- Megamenu -->
      </li>
      <li class="
                 menu-item-has-children
                 ">
        <!--  Single menu -->
        <!-- has dropdown -->
        <a href="javascript:void()">
          <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
            <span class="icon-box">
              <iconify-icon icon=heroicons-outline:template >
              </iconify-icon>
            </span>
            <div class="text-box">{{ __('Extra') }}
            </div>
          </div>
          <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
            <iconify-icon icon="heroicons-outline:chevron-down">
            </iconify-icon>
          </div>
        </a>
        <!-- Dropdown menu -->
        <ul class="sub-menu">
          <li>
            <a href=basic-table.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons-outline:table class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Basic Table') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=advance-table.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons-outline:table class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Advanced Table') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=apex-chart.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons-outline:chart-bar class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Apex Chart') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=chartjs.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons-outline:chart-bar class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Chart js') }}
                </span>
              </div>
            </a>
          </li>
          <li>
            <a href=map.html>
              <div class="flex space-x-2 items-start rtl:space-x-reverse">
                <iconify-icon icon=heroicons-outline:map class="leading-[1] text-base">
                </iconify-icon>
                <span class="leading-[1]">
                  {{ __('Map') }}
                </span>
              </div>
            </a>
          </li>
        </ul>
        <!-- Megamenu -->
      </li>
    </ul>
  </div>
  <!-- end top menu -->
