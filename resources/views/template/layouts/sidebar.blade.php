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
            </ul>
        </div>
    </div>
</div>