{{ flash() }}
                    <div class="col-span-12">
                        <div class="card">
                            <div class="card-body !py-0">
                                <ul class="flex flex-wrap w-full font-medium text-center nav-tabs">
                                    <li class="group active">
                                        <a href="javascript:void(0);" data-pc-toggle="tab" data-pc-target="profile-1" class="inline-flex items-center mr-6 py-4 transition-all duration-300 ease-linear border-t-2 border-b-2 border-transparent group-[.active]:text-primary-500 group-[.active]:border-b-primary-500 hover:text-primary-500 active:text-primary-500">
                                            <i class="ti ti-user ltr:mr-2 rtl:ml-2 text-lg leading-none"></i>
                                            Profile
                                        </a>
                                    </li>
                                    <li class="group">
                                        <a href="javascript:void(0);" data-pc-toggle="tab" data-pc-target="profile-2" class="inline-flex items-center mr-6 py-4 transition-all duration-300 ease-linear border-t-2 border-b-2 border-transparent group-[.active]:text-primary-500 group-[.active]:border-b-primary-500 hover:text-primary-500 active:text-primary-500">
                                            <i class="ti ti-file-text ltr:mr-2 rtl:ml-2 text-lg leading-none"></i>
                                            Personal Details
                                        </a>
                                    </li>
                                    <li class="group">
                                        <a href="javascript:void(0);" data-pc-toggle="tab" data-pc-target="profile-3" class="inline-flex items-center mr-6 py-4 transition-all duration-300 ease-linear border-t-2 border-b-2 border-transparent group-[.active]:text-primary-500 group-[.active]:border-b-primary-500 hover:text-primary-500 active:text-primary-500">
                                            <i class="ti ti-id ltr:mr-2 rtl:ml-2 text-lg leading-none"></i>
                                            My Account
                                        </a>
                                    </li>
                                    <li class="group">
                                        <a href="javascript:void(0);" data-pc-toggle="tab" data-pc-target="profile-4" class="inline-flex items-center mr-6 py-4 transition-all duration-300 ease-linear border-t-2 border-b-2 border-transparent group-[.active]:text-primary-500 group-[.active]:border-b-primary-500 hover:text-primary-500 active:text-primary-500">
                                            <i class="ti ti-lock ltr:mr-2 rtl:ml-2 text-lg leading-none"></i>
                                            Change Password
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="block tab-pane" id="profile-1">
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-12 lg:col-span-4 2xl:col-span-3">
                                        <div class="card">
                                            <div class="card-body relative">
                                                <div class="absolute right-0 top-0 p-[25px]">
                                                    <span class="badge bg-primary-500 text-white">Single</span>
                                                </div>
                                                <div class="text-center mt-3">
                                                    <div class="chat-avtar inline-flex mx-auto justify-center">
                                                        <img class="rounded-full w-[60px]" src="{{ asset('images/uploads/') ~ user_session_photo }}"
                                                        alt="User image">
                                                    </div>
                                                    <h5 class="mb-0">{{user_session_name}}</h5>
                                                    <p class="text-muted text-sm">Manufacturing Director</p>
                                                    <hr class="my-4 border-secondary-500/10">
                                                    <div class="grid grid-cols-12 gap-0 divide-x rtl:divide-x-reverse divide-inherit divide-theme-border dark:divide-themedark-border">
                                                        <div class="col-span-4">
                                                            <h5 class="mb-0">45</h5>
                                                            <small class="text-muted">Age</small>
                                                        </div>
                                                        <div class="col-span-4">
                                                            <h5 class="mb-0">86%</h5>
                                                            <small class="text-muted">Progress</small>
                                                        </div>
                                                        <div class="col-span-4">
                                                            <h5 class="mb-0">7634</h5>
                                                            <small class="text-muted">Visits</small>
                                                        </div>
                                                    </div>
                                                    <hr class="my-4 border-secondary-500/10">
                                                    <div class="inline-flex items-center gap-3 w-full mb-3">
                                                        <i class="ti ti-mail"></i>
                                                        <p class="mb-0">
                                                            <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="">{{user_session_email}}</a>
                                                        </p>
                                                    </div>
                                                    <div class="inline-flex items-center gap-3 w-full mb-3">
                                                        <i class="ti ti-phone"></i>
                                                        <p class="mb-0">{{user_session_phone}}</p>
                                                    </div>
                                                    <div class="inline-flex items-center gap-3 w-full mb-3">
                                                        <i class="ti ti-map-pin"></i>
                                                        <p class="mb-0">{{user_session_country}}</p>
                                                    </div>
                                                    <div class="inline-flex items-center gap-3 w-full">
                                                        <i class="ti ti-link"></i>
                                                        <a href="#" class="text-primary-500">
                                                            <p class="mb-0">https://anshan.dh.url</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Skills</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="grid grid-cols-12 gap-2 mb-3">
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <p class="mb-0">Junior</p>
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="flex items-center">
                                                            <div class="grow mr-3">
                                                                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 dark:bg-themedark-bodybg">
                                                                    <div class="bg-primary-500 h-full rounded-lg" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="shrink-0">
                                                                <p class="mb-0 text-muted">30%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-12 gap-2 mb-3">
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <p class="mb-0">UX Researcher</p>
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="flex items-center">
                                                            <div class="grow mr-3">
                                                                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 dark:bg-themedark-bodybg">
                                                                    <div class="bg-primary-500 h-full rounded-lg" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="shrink-0">
                                                                <p class="mb-0 text-muted">80%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-12 gap-2 mb-3">
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <p class="mb-0">Wordpress</p>
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="flex items-center">
                                                            <div class="grow mr-3">
                                                                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 dark:bg-themedark-bodybg">
                                                                    <div class="bg-primary-500 h-full rounded-lg" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="shrink-0">
                                                                <p class="mb-0 text-muted">90%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-12 gap-2 mb-3">
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <p class="mb-0">HTML</p>
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="flex items-center">
                                                            <div class="grow mr-3">
                                                                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 dark:bg-themedark-bodybg">
                                                                    <div class="bg-primary-500 h-full rounded-lg" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="shrink-0">
                                                                <p class="mb-0 text-muted">30%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-12 gap-2 mb-3">
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <p class="mb-0">Graphic Design</p>
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="flex items-center">
                                                            <div class="grow mr-3">
                                                                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 dark:bg-themedark-bodybg">
                                                                    <div class="bg-primary-500 h-full rounded-lg" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="shrink-0">
                                                                <p class="mb-0 text-muted">95%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grid grid-cols-12 gap-2 mb-3">
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <p class="mb-0">Code Style</p>
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="flex items-center">
                                                            <div class="grow mr-3">
                                                                <div class="w-full bg-theme-bodybg rounded-lg h-1.5 dark:bg-themedark-bodybg">
                                                                    <div class="bg-primary-500 h-full rounded-lg" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                            <div class="shrink-0">
                                                                <p class="mb-0 text-muted">75%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-8 2xl:col-span-9">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>About me</h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">Hello, I’m Anshan Handgun Creative Graphic Designer & User Experience Designer based in Website, I create digital Products a more Beautiful and usable place. Morbid accusant ipsum. Nam nec tellus at.</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Personal Details</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="*:py-4 divide-y divide-inherit border-theme-border dark:border-themedark-border">
                                                    <li class="list-group-item px-0 pt-0">
                                                        <div class="grid grid-cols-12 gap-6">
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Full Name</p>
                                                                <p class="mb-0">Aaron Poole</p>
                                                            </div>
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Father Name</p>
                                                                <p class="mb-0">Mr. Ralph Sabatini</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="grid grid-cols-12 gap-6">
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Country</p>
                                                                <p class="mb-0">{{user_session_country}}</p>
                                                            </div>
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Zip Code</p>
                                                                <p class="mb-0">{{user_session_zip}}</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 pb-0">
                                                        <p class="mb-1 text-muted">Address</p>
                                                        <p class="mb-0">507 Sulnek Grove, Tudzovgeh, United States - 37173</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Education</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="*:py-4 divide-y divide-inherit border-theme-border dark:border-themedark-border">
                                                    <li class="list-group-item px-0 pt-0">
                                                        <div class="grid grid-cols-12 gap-6">
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Master Degree (Year)</p>
                                                                <p class="mb-0">2014-2017</p>
                                                            </div>
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Institute</p>
                                                                <p class="mb-0">-</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="grid grid-cols-12 gap-6">
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Bachelor (Year)</p>
                                                                <p class="mb-0">2011-2013</p>
                                                            </div>
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Institute</p>
                                                                <p class="mb-0">Imperial College London</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="grid grid-cols-12 gap-6">
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">School (Year)</p>
                                                                <p class="mb-0">2009-2011</p>
                                                            </div>
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Institute</p>
                                                                <p class="mb-0">School of London, England</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Employment</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="*:py-4 divide-y divide-inherit border-theme-border dark:border-themedark-border">
                                                    <li class="list-group-item px-0 pt-0">
                                                        <div class="grid grid-cols-12 gap-6">
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Senior</p>
                                                                <p class="mb-0">Senior UI/UX designer (Year)</p>
                                                            </div>
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Job Responsibility</p>
                                                                <p class="mb-0">Perform task related to project manager with the 100+ team under my observation. Team management is key role in this company.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="grid grid-cols-12 gap-6">
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Trainee cum Project Manager (Year)</p>
                                                                <p class="mb-0">2017-2019</p>
                                                            </div>
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Job Responsibility</p>
                                                                <p class="mb-0">Team management is key role in this company.</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="grid grid-cols-12 gap-6">
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">School (Year)</p>
                                                                <p class="mb-0">2009-2011</p>
                                                            </div>
                                                            <div class="col-span-12 md:col-span-6">
                                                                <p class="mb-1 text-muted">Institute</p>
                                                                <p class="mb-0">School of London, England</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden tab-pane" id="profile-2">
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Personal Information</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="grid grid-cols-12 gap-6">
                                                    <div class="col-span-12 text-center mb-3">
                                                        <div class="user-upload w-[75px] mx-auto">
                                                            <label for="uplfile" class="img-avtar-upload relative overflow-hidden rounded-full inline-block group">
                                                                <img src="{{asset('images/uploads/') ~ user_session_photo}}" alt="img" class="img-fluid">
                                                                <div class="absolute inset-0 flex items-center justify-center gap-1 flex-col bg-dark-500/40 z-10 text-white opacity-0 group-hover:opacity-100 transition-all duration-300">
                                                                    <i class="ti ti-camera text-[28px] leading-none mb-1"></i>
                                                                    <span>Upload</span>
                                                                </div>
                                                            </label>
                                                            <input type="file" id="uplfile" class="hidden">
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Full Name</label>
                                                            <input type="text" class="form-control" value="{{user_session_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Country</label>
                                                            <input type="text" class="form-control" value="{{user_session_country}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Zip code</label>
                                                            <input type="text" class="form-control" value="{{user_session_zip}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Bio</label>
                                                            <textarea class="form-control">Hello, I’m Anshan Handgun Creative Graphic Designer & User Experience Designer based in Website, I create digital Products a more Beautiful and usable place. Morbid accusant ipsum. Nam nec tellus at.</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Experience</label>
                                                            <select class="form-control">
                                                                <option>Startup</option>
                                                                <option>2 year</option>
                                                                <option>3 year</option>
                                                                <option selected="selected">4 year</option>
                                                                <option>5 year</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Social Network</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="flex items-center mb-2">
                                                    <div class="grow mr-3">
                                                        <div class="flex items-center">
                                                            <div class="shrink-0">
                                                                <div class="w-9 h-9 rounded-xl text-[#42c0fb] inline-flex items-center justify-center bg-[#42c0fb]/10 hover:bg-[#42c0fb] hover:text-white">
                                                                    <i class="fab fa-twitter text-lg leading-none"></i>
                                                                </div>
                                                            </div>
                                                            <div class="grow ms-3">
                                                                <h6 class="mb-0">Twitter</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="shrink-0">
                                                        <button class="btn btn-link-primary">Connect</button>
                                                    </div>
                                                </div>
                                                <div class="flex items-center mb-2">
                                                    <div class="grow mr-3">
                                                        <div class="flex items-center">
                                                            <div class="shrink-0">
                                                                <div class="w-9 h-9 rounded-xl text-[#4267b2] inline-flex items-center justify-center bg-[#4267b2]/10 hover:bg-[#4267b2] hover:text-white">
                                                                    <i class="fab fa-facebook-f text-lg leading-none"></i>
                                                                </div>
                                                            </div>
                                                            <div class="grow ms-3">
                                                                <h6 class="mb-0">
                                                                    Facebook <small class="text-muted font-normal">/Anshan Handgun</small>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="shrink-0">
                                                        <button class="btn btn-link-danger">Remove</button>
                                                    </div>
                                                </div>
                                                <div class="flex items-center mb-2">
                                                    <div class="grow mr-3">
                                                        <div class="flex items-center">
                                                            <div class="shrink-0">
                                                                <div class="w-9 h-9 rounded-xl text-[#0077b5] inline-flex items-center justify-center bg-[#0077b5]/10 hover:bg-[#0077b5] hover:text-white">
                                                                    <i class="fab fa-linkedin-in text-lg leading-none"></i>
                                                                </div>
                                                            </div>
                                                            <div class="grow ms-3">
                                                                <h6 class="mb-0">Linkedin</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="shrink-0">
                                                        <button class="btn btn-link-primary">Connect</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Contact Information</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="grid grid-cols-12 gap-6">
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Contact Phone</label>
                                                            <input type="text" class="form-control" value="(+99) 9999 999 999">
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">
                                                                Email <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control" value="demo@sample.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Portfolio Url</label>
                                                            <input type="text" class="form-control" value="https://demo.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Address</label>
                                                            <textarea class="form-control">3379  Monroe Avenue, Fort Myers, Florida(33912)</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 text-right">
                                        <div class="btn btn-outline-secondary mx-1">Cancel</div>
                                        <div class="btn btn-primary mx-1">Update Profile</div>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden tab-pane" id="profile-3">
                                <div class="grid grid-cols-12 gap-6">
                                    <div class="col-span-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>General Settings</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="grid grid-cols-12 gap-6">
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">
                                                                Username <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control" value="Ashoka_Tano_16">
                                                            <small class="form-text text-muted">Your Profile URL: https://pc.com/Ashoka_Tano_16</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">
                                                                Account Email <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control" value="demo@sample.com">
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Language</label>
                                                            <select class="form-select">
                                                                <option>Washington</option>
                                                                <option>India</option>
                                                                <option>Africa</option>
                                                                <option>New York</option>
                                                                <option>Malaysia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-12 sm:col-span-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Sign in Using</label>
                                                            <select class="form-select">
                                                                <option>Password</option>
                                                                <option>Face Recognition</option>
                                                                <option>Thumb Impression</option>
                                                                <option>Key</option>
                                                                <option>Pin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Advance Settings</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="rounded-lg *:py-4 *:px-0 divide-y divide-inherit border-theme-border dark:border-themedark-border">
                                                    <li class="list-group-item px-0 !pt-0">
                                                        <div class="flex items-center justify-between">
                                                            <div>
                                                                <p class="mb-1">Secure Browsing</p>
                                                                <p class="text-muted text-sm mb-0">Browsing Securely ( https ) when it's necessary</p>
                                                            </div>
                                                            <div class="form-check form-switch p-0">
                                                                <input class="form-check-input h4 position-relative m-0" type="checkbox" role="switch" checked="">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="flex items-center justify-between">
                                                            <div>
                                                                <p class="mb-1">Login Notifications</p>
                                                                <p class="text-muted text-sm mb-0">Notify when login attempted from other place</p>
                                                            </div>
                                                            <div class="form-check form-switch p-0">
                                                                <input class="form-check-input h4 position-relative m-0" type="checkbox" role="switch" checked="">
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 !pb-0">
                                                        <div class="flex items-center justify-between">
                                                            <div>
                                                                <p class="mb-1">Login Approvals</p>
                                                                <p class="text-muted text-sm mb-0">Approvals is not required when login from unrecognized devices.</p>
                                                            </div>
                                                            <div class="form-check form-switch p-0">
                                                                <input class="form-check-input h4 position-relative m-0" type="checkbox" role="switch" checked="">
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Recognized Devices</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="rounded-lg *:py-4 *:px-0 divide-y divide-inherit border-theme-border dark:border-themedark-border">
                                                    <li class="list-group-item px-0 !pt-0">
                                                        <div class="flex items-center justify-between">
                                                            <div class="mr-2">
                                                                <p class="mb-2">Celt Desktop</p>
                                                                <p class="mb-0 text-muted">4351 Deans Lane</p>
                                                            </div>
                                                            <div class="">
                                                                <div class="text-success inline-block me-2">
                                                                    <i class="fas fa-circle f-10 me-2"></i>
                                                                    Current Active
                                                                </div>
                                                                <a href="#!" class="text-danger">
                                                                    <i class="feather icon-x-circle"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="flex items-center justify-between">
                                                            <div class="mr-2">
                                                                <p class="mb-2">Imco Tablet</p>
                                                                <p class="mb-0 text-muted">4185 Michigan Avenue</p>
                                                            </div>
                                                            <div class="">
                                                                <div class="text-muted inline-block me-2">
                                                                    <i class="fas fa-circle f-10 me-2"></i>
                                                                    5 days ago
                                                                </div>
                                                                <a href="#!" class="text-danger">
                                                                    <i class="feather icon-x-circle"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 !pb-0">
                                                        <div class="flex items-center justify-between">
                                                            <div class="mr-2">
                                                                <p class="mb-2">Albs Mobile</p>
                                                                <p class="mb-0 text-muted">3462 Fairfax Drive</p>
                                                            </div>
                                                            <div class="">
                                                                <div class="text-muted inline-block me-2">
                                                                    <i class="fas fa-circle f-10 me-2"></i>
                                                                    1 month ago
                                                                </div>
                                                                <a href="#!" class="text-danger">
                                                                    <i class="feather icon-x-circle"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Active Sessions</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="rounded-lg *:py-4 *:px-0 divide-y divide-inherit border-theme-border dark:border-themedark-border">
                                                    <li class="list-group-item px-0 !pt-0">
                                                        <div class="flex items-center justify-between">
                                                            <div class="mr-2">
                                                                <p class="mb-2">Celt Desktop</p>
                                                                <p class="mb-0 text-muted">4351 Deans Lane</p>
                                                            </div>
                                                            <button class="btn btn-link-danger">Logout</button>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item px-0 !pb-0">
                                                        <div class="flex items-center justify-between">
                                                            <div class="mr-2">
                                                                <p class="mb-2">Moon Tablet</p>
                                                                <p class="mb-0 text-muted">4185 Michigan Avenue</p>
                                                            </div>
                                                            <button class="btn btn-link-danger">Logout</button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 text-right flex items-center justify-end">
                                        <button class="btn btn-outline-dark mr-2">Clear</button>
                                        <button class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden tab-pane" id="profile-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Change Password</h5>
                                    </div>
                                    <form action="{{route('auth.change-password')}}" method="POST">
                                    <div class="card-body">
                                        <div class="grid grid-cols-12 gap-6">
                                            <div class="col-span-12 sm:col-span-6">
                                            <input type="hidden" name="user_email" class="form-control" value="{{user_session_email}}">
                                                <div class="mb-3">
                                                    <label class="form-label">Old Password</label>
                                                    <input type="password" name="current_password" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">New Password</label>
                                                    <input type="password" name="new_password" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Confirm Password</label>
                                                    <input type="password" name="confirm_password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-span-12 sm:col-span-6">
                                                <h5>New password must contain:</h5>
                                                <ul class="rounded-lg *:py-4 *:px-0 divide-y divide-inherit border-theme-border dark:border-themedark-border">
                                                    <li class="list-group-item">
                                                        <i class="ti ti-circle-check text-success f-16 me-2"></i>
                                                        At least 8 characters
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="ti ti-circle-check text-success f-16 me-2"></i>
                                                        At least 1 lower letter (a-z)
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="ti ti-circle-check text-success f-16 me-2"></i>
                                                        At least 1 uppercase letter(A-Z)
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="ti ti-circle-check text-success f-16 me-2"></i>
                                                        At least 1 number (0-9)
                                                    </li>
                                                    <li class="list-group-item">
                                                        <i class="ti ti-circle-check text-success f-16 me-2"></i>
                                                        At least 1 special characters
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right btn-page">
                                        <div class="btn btn-outline-secondary mx-1">Cancel</div>
                                        <!-- <div class="btn btn-primary mx-1">Update Profile</div> -->
                                        <button type="submit" name="submit" class="btn btn-primary">Reset Password</button>
                                    </div>
                                                            </form>
                                </div>
                            </div>
                        </div>
                    </div>