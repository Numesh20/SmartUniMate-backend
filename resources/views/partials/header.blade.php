<!-- HEADER -->
<header>
    <div class="logo" onclick="nav('home')">◈ Smart UniMate</div>
    <div class="topbar-right">
        <button class="icon-btn menu-toggle" onclick="toggleMobileNav()" title="Open menu"><i class="fa-solid fa-bars"></i></button>
        <button class="icon-btn" onclick="toggleTheme()" id="themeBtn" title="Toggle theme"><i class="fa-solid fa-moon"></i></button>
        <button class="icon-btn" onclick="toggleNotifPanel()" title="Notifications">
            <i class="fa-solid fa-bell"></i>
            <span class="notif-badge" id="notifBadge"></span>
        </button>
        <!-- Language Switcher -->
        <div class="lang-switcher" id="langSwitcher">
            <button class="icon-btn lang-btn" onclick="toggleLangMenu()" title="Change Language">
                <i class="fa-solid fa-globe"></i>
                <span class="lang-label" id="langLabel">EN</span>
            </button>
            <div class="lang-menu" id="langMenu">
                <div class="lang-option" onclick="setLang('en')">🇬🇧 English</div>
                <div class="lang-option" onclick="setLang('si')">🇱🇰 සිංහල</div>
                <div class="lang-option" onclick="setLang('ta')">🇮🇳 தமிழ்</div>
            </div>
        </div>
        <button class="auth-btn" id="authBtn" onclick="toggleAuth()"><i class="fa-brands fa-microsoft"></i><span> {{ __('messages.sign_in') }}</span></button>
    </div>
</header>