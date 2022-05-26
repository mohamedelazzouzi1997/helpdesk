<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs sm">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="setting">
            <div class="slim_scroll">
                <div class="card">
                    <h6>Theme Option</h6>
                    <div class="light_dark">
                        <div class="radio">
                            <input type="radio" name="radio1" id="lighttheme" value="light" >
                            <label for="lighttheme">Light Mode</label>
                        </div>
                        <div class="radio mb-0">
                            <input type="radio" name="radio1" id="darktheme" value="dark" checked>
                            <label for="darktheme">Dark Mode</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h6>Color Skins</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple"  @if ($setting == 'purple') class="active" @endif ><a href="{{ route('theme.color','purple') }}"><div class="purple"></div></a></li>
                        <li data-theme="blue"    @if ($setting == 'blue') class="active" @endif ><a href="{{ route('theme.color','blue') }}"><div class="blue"></div></a></li>
                        <li data-theme="cyan"    @if ($setting == 'cyan') class="active" @endif ><a href="{{ route('theme.color','cyan') }}"><div class="cyan"></div></a></li>
                        <li data-theme="green"   @if ($setting == 'green') class="active" @endif ><a href="{{ route('theme.color','green') }}"><div class="green"></div></a></li>
                        <li data-theme="orange"  @if ($setting == 'orange') class="active" @endif ><a href="{{ route('theme.color','orange') }}"><div class="orange"></div></a></li>
                        <li data-theme="blush"   @if ($setting == 'blush') class="active" @endif ><a href="{{ route('theme.color','blush') }}"><div class="blush"></div></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>
