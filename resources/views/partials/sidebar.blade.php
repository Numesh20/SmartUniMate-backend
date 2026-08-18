<!-- SIDEBAR -->
<aside>
    <div class="nav-section-label">Main</div>
    <div class="nav-item active" onclick="nav('home')" id="nav-home"><i class="fa-solid fa-house"></i> {{ __('messages.nav.home') }}</div>
    <div class="nav-item" onclick="nav('news')" id="nav-news"><i class="fa-solid fa-newspaper"></i> {{ __('messages.nav.news') }}</div>
    <div class="nav-item" onclick="nav('kb')" id="nav-kb"><i class="fa-solid fa-book-open"></i> {{ __('messages.nav.kb') }}</div>
    <div class="nav-item" onclick="nav('chatbot')" id="nav-chatbot"><i class="fa-solid fa-robot"></i> {{ __('messages.nav.chatbot') }}</div>
    <div class="nav-item" onclick="nav('academic')" id="nav-academic"><i class="fa-solid fa-book"></i> {{ __('messages.nav.academic') }}</div>
    <div class="nav-item" onclick="nav('timetable')" id="nav-timetable"><i class="fa-solid fa-calendar-days"></i> {{ __('messages.nav.timetable') }}</div>
    <div class="nav-item" onclick="nav('gpa')" id="nav-gpa"><i class="fa-solid fa-chart-line"></i> {{ __('messages.nav.gpa') }}</div>
    <div class="nav-item" onclick="nav('community')" id="nav-community"><i class="fa-solid fa-users"></i> {{ __('messages.nav.community') }}</div>
    <div style="margin-top:16px;">
    <div class="nav-section-label">Account</div>
    <div class="nav-item" onclick="nav('profile')" id="nav-profile"><i class="fa-solid fa-user"></i> {{ __('messages.nav.profile') }}</div>
    <div class="nav-item" onclick="nav('admin')" id="nav-admin" style="color:#c0392b;display:none;"><i class="fa-solid fa-shield-halved"></i> {{ __('messages.nav.admin') }}</div>
    </div>
</aside>