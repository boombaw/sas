<div id="mainnav-menu-wrap">
    <div class="nano">
        <div class="nano-content">
            <ul id="mainnav-menu" class="list-group">
                @foreach ($menuHeader as $header)
                    <!--Category name-->
                    <li class="list-header">{{ ucfirst(substr($header->menu_name, 10, strlen($header->menu_name)))}}</li>    
                    @php
                        $hasChild = \App\Menu::where('menu_parent', $header->menu_id)->get()->count();
                    @endphp
                    @if ($hasChild == 0 )
                        <!--Menu list item-->
                        <li> <a href="{{ $header->menu_link }}"> <i class="fa fa-home"></i> <span class="menu-title"> {{ ucfirst(substr($header->menu_name, 10, strlen($header->menu_name)))}} </span> </a> </li>
                    @else
                        <!--Menu list item-->
                        <li>
                            <a href="#">
                                <i class="{{ $header->menu_icon }}"></i>
                                <span class="menu-title">
                                    {{ ucfirst(substr($header->menu_name, 10, strlen($header->menu_name)))}}
                                </span>
                             <i class="arrow"></i>
                            </a>
                             <!--Submenu-->
                             <ul class="collapse">
                                @foreach ($menuChild as $child)
                                    @if ($child->menu_parent == $header->menu_id)
                                        <li><a href="{{ $child->menu_link }}"><i class="fa fa-circle-thin"></i> {{ ucfirst(substr($child->menu_name, 10, strlen($child->menu_name)))}} </a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    @endif
                @endforeach
                <!--Category name-->
                <li class="list-header">Extra</li>
                <!--Menu list item-->
                <li>
                    <a href="calendar.html">
                        <i class="fa fa-calendar"></i>
                        <span class="menu-title">
                            Calendar
                        </span>
                    </a>
                </li>
                <!--Menu list item-->
                <li>
                    <a href="ui-widgets.html">
                        <i class="fa fa-flask"></i>
                        <span class="menu-title">
                         Widgets
                         <span class="label label-pink pull-right">New</span>
                     </span>
                 </a>
             </li>
             <!--Menu list item-->
             <li>
                <a href="#">
                    <i class="fa fa-envelope-o"></i>
                    <span class="menu-title">Mail</span>
                    <i class="arrow"></i>
                </a>
                <!--Submenu-->
                <ul class="collapse">
                    <li><a href="mail-inbox.html"><i class="fa fa-caret-right"></i> Inbox </a></li>
                    <li><a href="mail-compose.html"><i class="fa fa-caret-right"></i> Compose </a></li>
                    <li><a href="mail-mailview.html"><i class="fa fa-caret-right"></i> Mail View </a></li>
                </ul>
            </li>
            <!--Menu list item-->
            <li>
                <a href="#">
                    <i class="fa fa-map-marker"></i>
                    <span class="menu-title">
                        Maps
                        <span class="label label-mint pull-right">New</span>
                    </span>
                </a>
                <!--Submenu-->
                <ul class="collapse">
                    <li><a href="maps-gmap.html">Google Maps</a></li>
                    <li><a href="maps-vectormap.html">Vector Maps</a></li>
                </ul>
            </li>
        </ul>
    <!--Widget-->
    <!--================================-->
    <div class="mainnav-widget">
        <!-- Show the button on collapsed navigation -->
        <div class="show-small">
            <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                <i class="fa fa-desktop"></i>
            </a>
        </div>
        <!-- Hide the content on collapsed navigation -->
        <div id="demo-wg-server" class="hide-small mainnav-widget-content">
            <ul class="list-group">
                <li class="list-header pad-no pad-ver">Server Status</li>
                <li class="mar-btm">
                    <span class="label label-primary pull-right">15%</span>
                    <p>CPU Usage</p>
                    <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-primary" style="width: 15%;">
                            <span class="sr-only">15%</span>
                        </div>
                    </div>
                </li>
                <li class="mar-btm">
                    <span class="label label-purple pull-right">75%</span>
                    <p>Bandwidth</p>
                    <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-purple" style="width: 75%;">
                            <span class="sr-only">75%</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--================================-->
    <!--End widget-->
</div>
</div>
</div>