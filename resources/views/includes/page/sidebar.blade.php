<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ asset('adminlte3/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; margin-left: 0px;">
      <span class="brand-text font-weight-light">{{env("APP_NAME", "")}}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{ asset('adminlte3/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image" />
          </div>
          <div class="info">
              <a href="#" class="d-block">{{ (!is_null(Auth::user()))? Auth::user()->name : "" }}</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            @php
                $pathUrl = \Request::path();
                if ($pathUrl != "/") {
                    $pathUrl = "/".\Request::path();
                }
            @endphp
            @if(isset($site))
                @if(isset($site["modules"]))
                    @if (count($site["modules"]) > 0)
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            @php
                                $i = 0;
                            @endphp
                            @foreach($site["modules"] as $key => $value)
                                @if (isset($value["parent"]))
                                    @php
                                        $parent = $value["parent"];
                                        $modules = $value["modules"];
                                        $openModule = false;
                                        foreach($modules as $key2 => $value2) {
                                            if ($value2["url"] == $pathUrl) {
                                                $openModule = true;
                                                break;
                                            }
                                        }
                                    @endphp
                                    <li class="nav-item has-treeview {{($openModule)? 'menu-open' : ''}}">
                                        <a href="#" class="nav-link {{($openModule)? 'active' : ''}}">
                                            <i class="nav-icon {{($parent['class_icon'] == '')? 'fas fa-circle' : $parent['class_icon']}}"></i>
                                            <p>{{$parent['name']}}
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        @if(count($modules) > 0)
                                        <ul class="nav nav-treeview">
                                            @php
                                                $j = 0;
                                            @endphp
                                            @foreach($modules as $key2 => $value2)
                                            <li class="nav-item has-treeview">
                                                <a href="{{($value2['num_childs'] > 0)? '#' : $value2['url']}}" class="nav-link {{($value2['url'] == $pathUrl)? 'active' : ''}}">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>{{$value2['name']}}
                                                        @if ($value2["num_childs"] > 0)
                                                            <i class="right fas fa-angle-left"></i>
                                                        @endif
                                                    </p>
                                                </a>
                                                @if ($value2["num_childs"] > 0)
                                                    <ul class="nav nav-treeview">
                                                        <li class="nav-item">
                                                          <a href="#" class="nav-link">
                                                            <i class="far fa-dot-circle nav-icon"></i>
                                                            <p>Level 3</p>
                                                          </a>
                                                        </li>
                                                        <li class="nav-item">
                                                          <a href="#" class="nav-link">
                                                            <i class="far fa-dot-circle nav-icon"></i>
                                                            <p>Level 3</p>
                                                          </a>
                                                        </li>
                                                        <li class="nav-item">
                                                          <a href="#" class="nav-link">
                                                            <i class="far fa-dot-circle nav-icon"></i>
                                                            <p>Level 3</p>
                                                          </a>
                                                        </li>
                                                    </ul>
                                                @endif
                                            </li>
                                            @php
                                                $j++;
                                            @endphp
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                @endif
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </ul>
                    @endif
                @endif
            @endif
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>