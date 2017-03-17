@if(0)
    <li class="{{ Request::is('home') ? 'active' : '' }}">
        <a href="/"><i class="fa fa-edit"></i><span>Indices</span></a>
    </li>
    <li class="treeview active">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu" style="display:none;">
            <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        </ul>
    </li>
    <li class="{{ Request::is('menues*') ? 'active' : '' }}">
    </li>
@endif
@foreach($layout_menus['menusFirst'] as $_menus)
    @if($layout_menus && $layout_menus['menusSecond']->has($_menus->id))
        @if($layout_menus['menusSecond'][$_menus->id]->count()>1)
            <li class="treeview {!! (isset($curr_menu) && $_menus->curr_menu==$curr_menu)?'active':'' !!}">
                <a href="#">
                    <i class="{!! $_menus->icon !!}"></i>
                    <span>{!! $_menus->name !!}-{!! $_menus->curr_menu !!}</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" {!! (isset($curr_menu) && $_menus->curr_menu==$curr_menu)?'active':'style="display:none;"' !!}>
                    @foreach($layout_menus['menusSecond'][$_menus->id] as $item)
                        <li>
                            <a href="{!! url($_menus->url) !!}">
                                <i class="fa fa-circle-o {!! (isset($curr_submenu) && $item->curr_submenu==$curr_submenu)?'text-aqua':'' !!}"></i>
                                {!! $item->name !!}-{!! $item->curr_menu !!}-{!! $item->curr_submenu !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @else
            <li class="{!! (isset($curr_menu) && $_menus->curr_menu==$curr_menu)?'active':'' !!}">
                <a href="{!! url($_menus->url) !!}"><i class="fa fa-edit"></i><span>{!! $_menus->name !!}</span></a>
            </li>
        @endif
    @endif
@endforeach