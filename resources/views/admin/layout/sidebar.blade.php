<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html"></a>
        </div>

        <ul class="sidebar-menu">

            <li><a class="nav-link" href="{{ route('admin') }}"><i class="fas fa-hand-point-right"></i></i>
                    <span>Dashboard</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>
                        Posts</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin_category_show') }}"><i class="fas fa-angle-right"></i>
                            Categories</a></li>
                    <li><a class="nav-link" href="{{ route('admin_sub_category_show') }}"><i
                                class="fas fa-angle-right"></i> SubCategories</a></li>
                    <li><a class="nav-link" href="{{ route('admin_post_show') }}"><i class="fas fa-angle-right"></i>
                            Post</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span> Photo
                        Gallery</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link" href="{{ route('admin_photo_show') }}"><i
                                class="fas fa-angle-right"></i> Photos</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>
                        Pages</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin_page_about') }}"><i class="fas fa-angle-right"></i>
                            About</a></li>
                    <li><a class="nav-link" href="{{ route('admin_faq_show') }}"><i class="fas fa-angle-right"></i>
                            FAQ</a></li>
                    <li><a class="nav-link" href="{{ route('admin_contact_show') }}"><i class="fas fa-angle-right"></i>
                            Contact</a></li>
                    <li><a class="nav-link" href="{{ route('admin_terms_show') }}"><i class="fas fa-angle-right"></i>
                            Terms And Conditions</a></li>
                    <li><a class="nav-link" href="{{ route('admin_post_show') }}"><i class="fas fa-angle-right"></i>
                            Privacy Policy</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>
                        Subscribers</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin_subscribers') }}"><i class="fas fa-angle-right"></i>
                            All Subscribers</a></li>
                    <li> <a class="nav-link" href="{{ route('admin_subscriber_send_email') }}"><i
                                class="fas fa-angle-right"></i> Sent Email</a>
                    </li>
                </ul>
            </li>
            <li class=""><a class="nav-link" href="{{ route('admin_setting') }}"><i
                        class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>
        </ul>
    </aside>
</div>
