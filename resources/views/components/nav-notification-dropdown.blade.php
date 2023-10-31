<!-- Notifications Dropdown area -->
<div class="relative md:block hidden">
    <button
      class="lg:h-[32px] lg:w-[32px] lg:bg-slate-50 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer
        rounded-full text-[20px] flex flex-col items-center justify-center"
      type="button"
      data-bs-toggle="dropdown"
      aria-expanded="false">
      <iconify-icon class="animate-tada text-slate-800 dark:text-white text-xl" icon="heroicons-outline:bell"></iconify-icon>
      <span class="absolute -right-1 lg:top-0 -top-[6px] h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
          justify-center rounded-full text-white z-[99]">
        4</span>
    </button>
    <!-- Notifications Dropdown -->
    <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 dark:divide-slate-900 shadow w-[335px]
        dark:bg-slate-800 border dark:border-slate-900 !top-[18px] rounded-md overflow-hidden lrt:origin-top-right rtl:origin-top-left">
      <div class="flex items-center justify-between py-4 px-4">
        <h3 class="text-sm font-Inter font-medium text-slate-700 dark:text-white">Notifications</h3>
        <a class="text-xs font-Inter font-normal underline text-slate-500 dark:text-white" href="#">See All</a>
      </div>
      <div class="divide-y divide-slate-100 dark:divide-slate-900" role="none">
        <div class="bg-slate-100 dark:bg-slate-700 dark:bg-opacity-70 text-slate-800 block w-full px-4 py-2 text-sm relative">
          <div class="flex ltr:text-left rtl:text-right">
            <div class="flex-none ltr:mr-3 rtl:ml-3">
              <div class="h-8 w-8 bg-white rounded-full">
                <img
                  src="/images/all-img/user.png"
                  alt="user"
                  class="border-white block w-full h-full object-cover rounded-full border">
              </div>
            </div>
            <div class="flex-1">
              <a
                href="#"
                class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                  before:top-0 before:left-0">
                Your order is placed</a>
              <div class="text-slate-500 dark:text-slate-200 text-xs leading-4">Amet minim mollit non deser unt ullamco est sit
                aliqua.</div>
              <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">
                3 min ago
              </div>
            </div>
          </div>
        </div>
        <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
          <div class="flex ltr:text-left rtl:text-right relative">
            <div class="flex-none ltr:mr-3 rtl:ml-3">
              <div class="h-8 w-8 bg-white rounded-full">
                <img
                  src="/images/all-img/user2.png"
                  alt="user"
                  class="border-transparent block w-full h-full object-cover rounded-full border">
              </div>
            </div>
            <div class="flex-1">
              <a
                href="#"
                class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                  before:top-0 before:left-0">
                Congratulations Darlene 🎉</a>
              <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">Won the monthly best seller badge</div>
              3 min ago
            </div>
          </div>
          <div class="flex-0">
            <span class="h-[10px] w-[10px] bg-danger-500 border border-white dark:border-slate-400 rounded-full inline-block"></span>
          </div>
        </div>
      </div>
      <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
        <div class="flex ltr:text-left rtl:text-right relative">
          <div class="flex-none ltr:mr-3 rtl:ml-3">
            <div class="h-8 w-8 bg-white rounded-full">
              <img
                src="/images/all-img/user3.png"
                alt="user"
                class="border-transparent block w-full h-full object-cover rounded-full border">
            </div>
          </div>
          <div class="flex-1">
            <a
              href="#"
              class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
              Revised Order 👋</a>
            <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">Won the monthly best seller badge</div>
            <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">3 min ago</div>
          </div>
        </div>
      </div>
      <div class="text-slate-600 dark:text-slate-300 block w-full px-4 py-2 text-sm">
        <div class="flex ltr:text-left rtl:text-right relative">
          <div class="flex-none ltr:mr-3 rtl:ml-3">
            <div class="h-8 w-8 bg-white rounded-full">
              <img
                src="/images/all-img/user4.png"
                alt="user"
                class="border-transparent block w-full h-full object-cover rounded-full border">
            </div>
          </div>
          <div class="flex-1">
            <a
              href="#"
              class="text-slate-600 dark:text-slate-300 text-sm font-medium mb-1 before:w-full before:h-full before:absolute
                before:top-0 before:left-0">
              Brooklyn Simmons</a>
            <div class="text-slate-600 dark:text-slate-300 text-xs leading-4">Added you to Top Secret Project group...</div>
            <div class="text-slate-400 dark:text-slate-400 text-xs mt-1">
              3 min ago
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
