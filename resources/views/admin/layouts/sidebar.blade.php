<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="form-inline mr-auto"></div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, Admin</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" onclick="event.preventDefault();
        this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>




            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Sections</li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Hero</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.typer-title.index') }}">Typer Title</a></li>
                    <li><a class="nav-link" href="{{ route('admin.hero.index') }}">Hero Section</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Services</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    {{-- <li><a class="nav-link" href="{{ route('admin.service.index') }}"><i
                                class="fas fa-fire"></i>Services Section Setting</a>
                    </li> --}}

                    <li><a class="nav-link" href="{{ route('admin.service.index') }}"><i
                                class="fas fa-fire"></i>Services</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Career Development</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    {{-- <li><a class="nav-link" href="{{ route('admin.service.index') }}"><i
                                class="fas fa-fire"></i>Career Section Setting</a>
                    </li> --}}

                    <li><a class="nav-link" href="{{ route('admin.service.index') }}"><i class="fas fa-fire"></i>Career
                            Growth</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Personal Development</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.personal-growth-section-setting.index') }}"><i
                                class="fas fa-fire"></i>Section Setting</a>
                    </li>

                    <li><a class="nav-link" href="{{ route('admin.personal-growth.index') }}"><i class="fas fa-fire"></i>Personal
                            Growth</a>
                    </li>
                </ul>
            </li>

            <li><a class="nav-link" href="{{ route('admin.about.index') }}"><i class="fas fa-fire"></i>About</a></li>


            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Portfolio</span></a>
                <ul class="dropdown-menu" style="display: none;">
                    <li><a class="nav-link" href="{{ route('admin.category.index') }}">Category</a></li>
                    <li><a class="nav-link" href="{{ route('admin.portfolio-item.index') }}">Portfolio Item</a></li>
                    <li><a class="nav-link" href="{{ route('admin.portfolio-section-setting.index') }}">Section
                            Setting</a></li>


                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Skill</span></a>
                <ul class="dropdown-menu" style="display: none;">

                    <li><a class="nav-link" href="{{ route('admin.skill-section-setting.index') }}">Skill Setting</a>
                    </li>
                    <li><a class="nav-link" href="{{ route('admin.skill-item.index') }}">Skill Bars</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('admin.experience.index') }}"><i class="fas fa-fire"></i>
                    <span>Experience</span></a></li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i>
                    <span>Feedback</span></a>
                <ul class="dropdown-menu" style="display: none;">

                    <li><a class="nav-link" href="{{ route('admin.feedback.index') }}">Feedbacks</a></li>
                    <li><a class="nav-link" href="{{ route('admin.feedback-section-setting.index') }}">Feedback
                            Section Setting</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Blogs</span></a>
                <ul class="dropdown-menu" style="display: none;">

                    <li><a class="nav-link" href="{{ route('admin.blog-category.index') }}">Blogs Category</a></li>
                    <li><a class="nav-link" href="{{ route('admin.blog.index') }}">Blogs </a></li>
                    <li><a class="nav-link" href="{{ route('admin.blog-section-setting.index') }}">Blogs Section
                            Setting </a></li>

                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Contact</span></a>
                <ul class="dropdown-menu" style="display: none;">

                    <li><a class="nav-link" href="{{ route('admin.contact-section-setting.index') }}">Contact Section
                            Setting </a></li>

                </ul>
            </li>
            <li class="nav-item dropdown"
                {{ setSidebarActive(['admin.footer-social-link.*', 'admin.footer-info.*', 'admin.footer-useful-links.*', 'admin.footer-help-links.*']) }}>
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Footer</span></a>
                <ul class="dropdown-menu" style="display: none;">

                    <li class="{{ setSidebarActive(['admin.footer-social-link.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-social-link.index') }}">Social Links</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-info.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-info.index') }}">Footer Info</a></li>
                    <li><a class="nav-link" href="{{ route('admin.footer-info-contact.index') }}">Footer Contact
                            Info</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-useful-links.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-useful-links.index') }}">Footer Useful Links</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-help-links.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-help-links.index') }}">Footer Help Links</a></li>

                </ul>
            </li>

            {{-- <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Settings</span></a>
          <ul class="dropdown-menu" style="display: none;">
            
            <li><a class="nav-link" href="{{route('admin.general-setting.index')}}">General Setting </a></li>

          </ul>
        </li> --}}

            <li class="menu-header">Settings</li>
            <li class="{{ setSidebarActive(['admin.settings.*']) }}"><a class="nav-link"
                    href="{{ route('admin.settings.index') }}"><i class="fas fa-fire"></i>Settings</a></li>


            {{-- <li><a class="nav-link" href="blank.html"><i class="fas fa-fire"></i> <span>Blank Page</span></a></li> --}}

        </ul>
    </aside>
</div>
