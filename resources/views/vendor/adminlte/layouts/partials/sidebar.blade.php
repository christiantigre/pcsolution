<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            <li class="active"><a href="{{ url('/admin/orders') }}"><i class='fa fa-link'></i> <span>{{ trans('message.order') }}</span></a></li>
            <li class="active"><a href="{{ url('/admin/clients') }}"><i class='fa fa-link'></i> <span>{{ trans('message.client') }}</span></a></li>
            <li class="active"><a href="{{ url('/admin/product') }}"><i class='fa fa-link'></i> <span>{{ trans('message.product') }}</span></a></li>
            <li class="active"><a href="{{ url('/admin/proveedor') }}"><i class='fa fa-link'></i> <span>{{ trans('message.proveedor') }}</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('message.conf') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/admin/empres">{{ trans('message.empress') }}</a></li>
                    <li><a href="/admin/estados">{{ trans('message.status') }}</a></li>
                    <li><a href="/admin/articles">{{ trans('message.article') }}</a></li>
                    <li><a href="/admin/marcas">{{ trans('message.brands') }}</a></li>
                    <li><a href="/admin/pais">{{ trans('message.country') }}</a></li>
                    <li><a href="/admin/provincia">{{ trans('message.prov') }}</a></li>
                    <li><a href="/admin/canton">{{ trans('message.canton') }}</a></li>
                    <li><a href="/admin/parroquia">{{ trans('message.parr') }}</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
