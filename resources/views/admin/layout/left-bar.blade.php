<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{route('admin.admin-dashboard')}}" class="brand-link">
    <img src="{{ \App\Http\Controllers\ExtraController::assetURL('Design-admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Admin Panel</span>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('admin.admin-dashboard')}}" @if((\Request::route()->getName() == 'admin.admin-dashboard')) class="nav-link active" @else class="nav-link" @endif>
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>
            <li class="nav-header">NEWS</li>
            <li class="nav-item">
                <a href="{{route('admin.category.view')}}" @if((\Request::route()->getName() == 'admin.category.view')) class="nav-link active" @else class="nav-link" @endif>
                <i class="nav-icon fa fa-list-alt"></i>
                <p>
                    Category
                </p>
                </a>
            </li>
            <li class="nav-item has-treeview @if((\Request::route()->getName() == 'admin.news.view')) menu-open @endif @if((\Request::route()->getName() == 'admin.news.add')) menu-open @endif">
                <a href="#" class="nav-link @if((\Request::route()->getName() == 'admin.news.view')) active @endif @if((\Request::route()->getName() == 'admin.news.add')) active @endif">
                <i class="nav-icon fa fa-newspaper"></i>
                <p>
                    News
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.news.view')}}" class="nav-link @if((\Request::route()->getName() == 'admin.news.view')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.news.add')}}" class="nav-link @if((\Request::route()->getName() == 'admin.news.add')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item has-treeview @if((\Request::route()->getName() == 'admin.breaking-news.view')) menu-open @endif @if((\Request::route()->getName() == 'admin.breaking-news.add')) menu-open @endif">
                <a href="#" class="nav-link @if((\Request::route()->getName() == 'admin.breaking-news.view')) active @endif @if((\Request::route()->getName() == 'admin.breaking-news.add')) active @endif">
                <i class="nav-icon fa fa-newspaper"></i>
                <p>
                    Breaking News
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.breaking-news.view')}}" class="nav-link @if((\Request::route()->getName() == 'admin.breaking-news.view')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.breaking-news.add')}}" class="nav-link @if((\Request::route()->getName() == 'admin.breaking-news.add')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-header">GALLERY OR VIDEO</li>
            <li class="nav-item has-treeview @if((\Request::route()->getName() == 'admin.ngo-gallery.view')) menu-open @endif @if((\Request::route()->getName() == 'admin.ngo-gallery.add')) menu-open @endif">
                <a href="#" class="nav-link @if((\Request::route()->getName() == 'admin.ngo-gallery.view')) active @endif @if((\Request::route()->getName() == 'admin.ngo-gallery.add')) active @endif">
                    <i class="nav-icon fas fa-video"></i>
                <p>
                    Ngo Gallery
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.ngo-gallery.view')}}" class="nav-link @if((\Request::route()->getName() == 'admin.ngo-gallery.view')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.ngo-gallery.add')}}" class="nav-link @if((\Request::route()->getName() == 'admin.ngo-gallery.add')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item has-treeview @if((\Request::route()->getName() == 'admin.social-video.view')) menu-open @endif @if((\Request::route()->getName() == 'admin.social-video.add')) menu-open @endif">
                <a href="#" class="nav-link @if((\Request::route()->getName() == 'admin.social-video.view')) active @endif @if((\Request::route()->getName() == 'admin.social-video.add')) active @endif">
                    <i class="nav-icon fas fa-video"></i>
                <p>
                    Social Video
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.social-video.view')}}" class="nav-link @if((\Request::route()->getName() == 'admin.social-video.view')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.social-video.add')}}" class="nav-link @if((\Request::route()->getName() == 'admin.social-video.add')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item has-treeview @if((\Request::route()->getName() == 'admin.aim-india-image.view')) menu-open @endif @if((\Request::route()->getName() == 'admin.aim-india-image.add')) menu-open @endif">
                <a href="#" class="nav-link @if((\Request::route()->getName() == 'admin.aim-india-image.view')) active @endif @if((\Request::route()->getName() == 'admin.aim-india-image.add')) active @endif">
                    <i class="nav-icon fas fa-video"></i>
                <p>
                    Aim India Image
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.aim-india-image.view')}}" class="nav-link @if((\Request::route()->getName() == 'admin.aim-india-image.view')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.aim-india-image.add')}}" class="nav-link @if((\Request::route()->getName() == 'admin.aim-india-image.add')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-header">CONTENT</li>
            <li class="nav-item has-treeview @if((\Request::route()->getName() == 'admin.advertisement.view')) menu-open @endif @if((\Request::route()->getName() == 'admin.advertisement.add')) menu-open @endif">
                <a href="#"  class="nav-link @if((\Request::route()->getName() == 'admin.advertisement.view')) active @endif @if((\Request::route()->getName() == 'admin.advertisement.add')) active @endif" >
                <i class="nav-icon fas fa-ad"></i>
                <p>
                    Advertisement
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admin.advertisement.view')}}" @if((\Request::route()->getName() == 'admin.advertisement.view')) class="nav-link active" @else class="nav-link" @endif>
                    <i class="far fa-circle nav-icon"></i>
                    <p>List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.advertisement.add')}}" class="nav-link @if((\Request::route()->getName() == 'admin.advertisement.add')) active @endif">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add</p>
                    </a>
                </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.contents.edit')}}" @if((\Request::route()->getName() == 'admin.contents.edit')) class="nav-link active" @else class="nav-link" @endif>
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Contents
                    </p>
                </a>
            </li>
            <li class="nav-header">CONECTED PEOPLE</li>
            <li class="nav-item">
                <a href="{{route('admin.comment.view')}}" @if((\Request::route()->getName() == 'admin.comment.view')) class="nav-link active" @else class="nav-link" @endif>
                <i class="nav-icon fas fa-comment"></i>
                <p>
                    Comment
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.contact-message.view')}}" @if((\Request::route()->getName() == 'admin.contact-message.view')) class="nav-link active" @else class="nav-link" @endif>
                <i class="nav-icon fas fa-phone"></i>
                <p>
                    Contact Message
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.advertisement-request.view')}}" @if((\Request::route()->getName() == 'admin.advertisement-request.view')) class="nav-link active" @else class="nav-link" @endif>
                <i class="nav-icon fas fa-phone"></i>
                <p>
                    Advertisement Message
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.subscribers.view')}}" @if((\Request::route()->getName() == 'admin.subscribers.view')) class="nav-link active" @else class="nav-link" @endif>
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Subscribers
                </p>
                </a>
            </li>
        </ul>
    </nav>
  </div>
</aside>
