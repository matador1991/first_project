<div class="container-fluid">
    <div class="row ">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed pt-2">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{route('dashboard')}}">
                            <div class="pull-left"><i class="ti-dashboard"></i>
                                <span class="right-nav-text">{{trans('dashboard.dashboard')}}</span>
                            </div>
                        </a>
                        <div class="clearfix"></div>
                    </li>
                    <li>
                        <a href="{{route('admin.index')}}">
                            <div class="pull-left"><i class="ti-user"></i><span
                                    class="right-nav-text">{{trans('sidebar.admin')}}</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#service">
                            <div class="pull-left"><i class="ti-help"></i><span
                                    class="right-nav-text">{{trans('sidebar.service')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="service" class="collapse" data-parent="#service">
                            <li><a href="{{route('service.index')}}">{{trans('sidebar.service-menu')}}</a></li>
                            <li><a href="{{route('service.create')}}">{{trans('service.create')}}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#client">
                            <div class="pull-left"><i class="ti-user"></i><span
                                    class="right-nav-text">{{trans('sidebar.client')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="client" class="collapse" data-parent="#client">
                            <li><a href="{{route('client.index')}}">{{trans('sidebar.client-menu')}}</a></li>
                            <li><a href="{{route('client.create')}}">{{trans('client.create')}}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#project">
                            <div class="pull-left"><i class="ti-bag"></i><span
                                    class="right-nav-text">{{trans('sidebar.project')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="project" class="collapse" data-parent="#project">
                            <li><a href="{{route('project.index')}}">{{trans('sidebar.project-menu')}}</a></li>
                            <li><a href="{{route('project.create')}}">{{trans('project.create')}}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#member">
                            <div class="pull-left"><i class="ti-user"></i><span
                                    class="right-nav-text">{{trans('sidebar.member')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="member" class="collapse" data-parent="#member">
                            <li><a href="{{route('member.index')}}">{{trans('sidebar.member-menu')}}</a></li>
                            <li><a href="{{route('member.create')}}">{{trans('member.create')}}</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#page">
                            <div class="pull-left"><i class="ti-file"></i><span
                                    class="right-nav-text">{{trans('sidebar.page')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="page" class="collapse" data-parent="#page">
                            <li><a href="{{route('page.index')}}">{{trans('sidebar.page-menu')}}</a></li>
                            <li><a href="{{route('page.create')}}">{{trans('sidebar.addPage')}}</a></li>
                        </ul>
                    </li>
                    <li>
                    <li>
                        <a href="{{route('news_letter.index')}}">
                            <div class="pull-left"><i class="ti-email"></i><span
                                    class="right-nav-text">{{trans('sidebar.news_letter')}}</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('setting.index')}}">
                            <div class="pull-left"><i class="ti-settings"></i><span
                                    class="right-nav-text">{{trans('sidebar.setting')}}</span></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                    <li>
                        <a href="todo-list.html"><i class="ti-menu-alt"></i><span class="right-nav-text">Todo
                                list</span> </a>
                    </li>
                    <!-- menu item chat-->
                    <li>
                        <a href="chat-page.html"><i class="ti-comments"></i><span class="right-nav-text">Chat
                            </span></a>
                    </li>
                    <!-- menu item mailbox-->
                    <li>
                        <a href="mail-box.html"><i class="ti-email"></i><span class="right-nav-text">Mail
                                box</span> <span class="badge badge-pill badge-warning float-right mt-1">HOT</span> </a>
                    </li>
                    <!-- menu item Charts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                            <div class="pull-left"><i class="ti-pie-chart"></i><span
                                    class="right-nav-text">Charts</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="chart" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="chart-js.html">Chart.js</a> </li>
                            <li> <a href="chart-morris.html">Chart morris </a> </li>
                            <li> <a href="chart-sparkline.html">Chart Sparkline</a> </li>
                        </ul>
                    </li>

                    <!-- menu font icon-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">font
                                    icon</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                            <li> <a href="themify-icons.html">Themify icons</a> </li>
                            <li> <a href="weather-icon.html">Weather icons</a> </li>
                        </ul>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Widgets, Forms & Tables </li>
                    <!-- menu item Widgets-->
                    <li>
                        <a href="widgets.html"><i class="ti-blackboard"></i><span class="right-nav-text">Widgets</span>
                            <span class="badge badge-pill badge-danger float-right mt-1">59</span> </a>
                    </li>
                    <!-- menu item Form-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Form &
                                    Editor</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="editor.html">Editor</a> </li>
                            <li> <a href="editor-markdown.html">Editor Markdown</a> </li>
                            <li> <a href="form-input.html">Form input</a> </li>
                            <li> <a href="form-validation-jquery.html">form validation jquery</a> </li>
                            <li> <a href="form-wizard.html">form wizard</a> </li>
                            <li> <a href="form-repeater.html">form repeater</a> </li>
                            <li> <a href="input-group.html">input group</a> </li>
                            <li> <a href="toastr.html">toastr</a> </li>
                        </ul>
                    </li>
                    <!-- menu item table -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span class="right-nav-text">data
                                    table</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="table" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="data-html-table.html">Data html table</a> </li>
                            <li> <a href="data-local.html">Data local</a> </li>
                            <li> <a href="data-table.html">Data table</a> </li>
                        </ul>
                    </li>
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">More Pages</li>
                    <!-- menu item Custom pages-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                            <div class="pull-left"><i class="ti-file"></i><span class="right-nav-text">Custom
                                    pages</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="projects.html">projects</a> </li>
                            <li> <a href="project-summary.html">Projects summary</a> </li>
                            <li> <a href="profile.html">profile</a> </li>
                            <li> <a href="app-contacts.html">App contacts</a> </li>
                            <li> <a href="contacts.html">Contacts</a> </li>
                            <li> <a href="file-manager.html">file manager</a> </li>
                            <li> <a href="invoice.html">Invoice</a> </li>
                            <li> <a href="blank.html">Blank page</a> </li>
                            <li> <a href="layout-container.html">layout container</a> </li>
                            <li> <a href="error.html">Error</a> </li>
                            <li> <a href="faqs.html">faqs</a> </li>
                        </ul>
                    </li>
                    <!-- menu item Authentication-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                            <div class="pull-left"><i class="ti-id-badge"></i><span
                                    class="right-nav-text">Authentication</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="login.html">login</a> </li>
                            <li> <a href="register.html">register</a> </li>
                            <li> <a href="lockscreen.html">Lock screen</a> </li>
                        </ul>
                    </li>
                    <!-- menu item maps-->
                    <li>
                        <a href="maps.html"><i class="ti-location-pin"></i><span class="right-nav-text">maps</span>
                            <span class="badge badge-pill badge-success float-right mt-1">06</span></a>
                    </li>
                    <!-- menu item timeline-->
                    <li>
                        <a href="timeline.html"><i class="ti-panel"></i><span class="right-nav-text">timeline</span>
                        </a>
                    </li>
                    <!-- menu item Multi level-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                            <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">Multi
                                    level Menu</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">Level
                                    item 1<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="auth" class="collapse">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#login">Level
                                            item 1.1<div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="login" class="collapse">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="collapse"
                                                   data-target="#invoice">level item 1.1.1<div class="pull-right"><i
                                                            class="ti-plus"></i></div>
                                                    <div class="clearfix"></div>
                                                </a>
                                                <ul id="invoice" class="collapse">
                                                    <li> <a href="#">level item 1.1.1.1</a> </li>
                                                    <li> <a href="#">level item 1.1.1.2</a> </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li> <a href="#">level item 1.2</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">level
                                    item 2<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="error" class="collapse">
                                    <li> <a href="#">level item 2.1</a> </li>
                                    <li> <a href="#">level item 2.2</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
