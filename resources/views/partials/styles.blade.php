<style>
        :root {
            --primary: #800000;
            --primary-light: #a01010;
            --secondary: #005A9E;
            --bg: #f5f4f0;
            --surface: #ffffff;
            --surface2: #f9f8f5;
            --border: rgba(0,0,0,0.08);
            --text: #1a1a1a;
            --text-muted: #6b6b6b;
            --success: #2d7a4f;
            --danger: #c0392b;
            --radius: 14px;
            --shadow: 0 2px 16px rgba(0,0,0,0.07);
        }
        body.dark {
            --bg: #0f0f0f;
            --surface: #1a1a1a;
            --surface2: #222222;
            --border: rgba(255,255,255,0.08);
            --text: #f0ede8;
            --text-muted: #888;
            --shadow: 0 2px 16px rgba(0,0,0,0.4);
        }
        /* Color Palettes */
        body.palette-ocean { --primary: #0077b6; --primary-light: #0096c7; --danger: #023e8a; }
        body.palette-forest { --primary: #2d6a4f; --primary-light: #40916c; --danger: #1b4332; }
        body.palette-sunset { --primary: #e76f51; --primary-light: #f4a261; --danger: #e63946; }
        body.palette-purple { --primary: #7b2cbf; --primary-light: #9d4edd; --danger: #5a189a; }
        /* Glass Effect */
        body.glass-mode .card, body.glass-mode header, body.glass-mode aside {
            background: rgba(255,255,255,0.6) !important;
            backdrop-filter: blur(16px) !important;
            -webkit-backdrop-filter: blur(16px) !important;
            border: 1px solid rgba(255,255,255,0.3) !important;
        }
        body.dark.glass-mode .card, body.dark.glass-mode header, body.dark.glass-mode aside {
            background: rgba(30,30,30,0.6) !important;
            border: 1px solid rgba(255,255,255,0.08) !important;
        }
        /* Comment Sections */
        .comment-section { margin-top:12px; border-top:1px solid var(--border); padding-top:12px; }
        .comment-item { display:flex; gap:10px; padding:8px 0; border-bottom:1px solid var(--border); font-size:13px; }
        .comment-item:last-child { border-bottom:none; }
        .comment-input-row { display:flex; gap:8px; margin-top:8px; }
        .comment-input-row input { flex:1; font-size:13px; }
        .comment-input-row button { font-size:12px; white-space:nowrap; }
        /* Setting toggles */
        .setting-row { display:flex; justify-content:space-between; align-items:center; padding:16px 0; border-bottom:1px solid var(--border); }
        .setting-row:last-child { border-bottom:none; }
        .setting-label { font-weight:500; }
        .setting-desc { font-size:12px; color:var(--text-muted); margin-top:2px; }
        .toggle-switch { position:relative; width:44px; height:24px; cursor:pointer; }
        .toggle-switch input { opacity:0; width:0; height:0; }
        .toggle-track { position:absolute; inset:0; background:var(--border); border-radius:12px; transition:0.3s; }
        .toggle-track:after { content:''; position:absolute; width:18px; height:18px; left:3px; top:3px; background:#fff; border-radius:50%; transition:0.3s; }
        .toggle-switch input:checked + .toggle-track { background:var(--primary); }
        .toggle-switch input:checked + .toggle-track:after { transform:translateX(20px); }
        .palette-swatch { width:32px; height:32px; border-radius:50%; cursor:pointer; border:3px solid transparent; transition:0.2s; }
        .palette-swatch:hover, .palette-swatch.active { border-color:var(--text); transform:scale(1.15); }
        .post-image { max-width:100%; max-height:300px; border-radius:8px; margin-top:8px; object-fit:cover; }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg);
            color: var(--text);
            transition: background 0.3s, color 0.3s;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ── TOPBAR ── */
        header {
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            padding: 0 32px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }
        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: var(--primary);
            cursor: pointer;
            letter-spacing: -0.3px;
        }
        .topbar-right { display: flex; align-items: center; gap: 6px; }
        /* Language Switcher */
        .lang-switcher { position: relative; }
        .lang-btn { width: auto !important; padding: 0 8px; gap: 4px; font-size: 13px; font-weight: 600; }
        .lang-label { font-size: 11px; font-weight: 700; letter-spacing: 0.5px; }
        .lang-menu {
            display: none; position: absolute; top: calc(100% + 6px); right: 0;
            background: var(--surface2); border: 1px solid var(--border);
            border-radius: 10px; overflow: hidden; min-width: 140px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.3); z-index: 999;
        }
        .lang-menu.open { display: block; animation: up 0.15s ease; }
        .lang-option {
            padding: 10px 14px; cursor: pointer; font-size: 13px;
            color: var(--text); transition: background 0.12s;
        }
        .lang-option:hover { background: var(--surface3, rgba(255,255,255,0.06)); }
        .lang-option.active { color: var(--primary); font-weight: 600; }
        .icon-btn {
            background: none; border: 1px solid transparent;
            width: 36px; height: 36px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            color: var(--text-muted); cursor: pointer; font-size: 15px;
            transition: 0.15s; position: relative;
        }
        .icon-btn:hover { background: var(--surface2); border-color: var(--border); color: var(--text); }
        .notif-badge {
            position: absolute; top: 4px; right: 4px;
            width: 8px; height: 8px; background: var(--danger);
            border-radius: 50%; border: 1.5px solid var(--surface);
        }
        .auth-btn {
            background: var(--primary); color: #fff; border: none;
            padding: 0 16px; height: 34px; border-radius: 8px;
            font-size: 13px; font-weight: 600; cursor: pointer;
            transition: 0.15s; font-family: inherit;
        }
        .auth-btn:hover { background: var(--primary-light); }

        /* ── LAYOUT ── */
        .app-shell { display: flex; min-height: calc(100vh - 60px); }

        /* ── SIDEBAR ── */
        aside {
            width: 220px; min-width: 220px;
            background: var(--surface);
            border-right: 1px solid var(--border);
            padding: 20px 12px;
            position: sticky;
            top: 60px;
            height: calc(100vh - 60px);
            overflow-y: auto;
        }
        .nav-section-label {
            font-size: 10px; font-weight: 600;
            text-transform: uppercase; letter-spacing: 1px;
            color: var(--text-muted); padding: 4px 12px 8px;
        }
        .nav-item {
            display: flex; align-items: center; gap: 10px;
            padding: 9px 12px; border-radius: 9px;
            cursor: pointer; font-size: 14px; font-weight: 500;
            color: var(--text-muted); transition: 0.15s; margin-bottom: 2px;
            border: 1px solid transparent;
        }
        .nav-item:hover { background: var(--surface2); color: var(--text); }
        .nav-item.active { background: #80000012; color: var(--primary); border-color: #80000022; }
        .nav-item i { width: 16px; text-align: center; font-size: 14px; }

        /* ── MAIN ── */
        main { flex: 1; padding: 32px; max-width: 1120px; width: 100%; }
        .section { display: none; animation: up 0.25s ease; }
        .section.active { display: block; }
        @keyframes up { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }

        /* ── COMPONENTS ── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 24px;
            box-shadow: var(--shadow);
            margin-bottom: 20px;
        }
        .card-sm { padding: 16px; }
        h2.page-title {
            font-family: 'Playfair Display', serif;
            font-size: 26px; color: var(--primary);
            margin-bottom: 20px; font-weight: 700;
        }
        h3.section-title { font-size: 15px; font-weight: 600; margin-bottom: 16px; }
        .btn {
            padding: 9px 18px; border-radius: 8px; border: none;
            font-family: inherit; font-size: 14px; font-weight: 600;
            cursor: pointer; transition: 0.15s;
        }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-light); }
        .btn-outline {
            background: none; border: 1px solid var(--border);
            color: var(--text); 
        }
        .btn-outline:hover { background: var(--surface2); }
        input, textarea, select {
            width: 100%; padding: 10px 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--surface2); color: var(--text);
            font-family: inherit; font-size: 14px;
            outline: none; transition: 0.15s;
        }
        input:focus, textarea:focus { border-color: var(--primary); }
        label { font-size: 13px; font-weight: 500; color: var(--text-muted); display: block; margin-bottom: 6px; }
        .form-group { margin-bottom: 16px; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .grid-3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
        .stat-card {
            background: var(--surface2); border: 1px solid var(--border);
            border-radius: 10px; padding: 16px; text-align: center;
        }
        .stat-num { font-size: 28px; font-weight: 700; color: var(--primary); }
        .stat-label { font-size: 12px; color: var(--text-muted); margin-top: 4px; }
        .tag {
            display: inline-block; padding: 3px 10px;
            border-radius: 20px; font-size: 12px; font-weight: 600;
        }
        .tag-blue { background: #e6f1fb; color: #185FA5; }
        .tag-green { background: #eaf3de; color: #3B6D11; }
        .tag-red { background: #fcebeb; color: #A32D2D; }
        body.dark .tag-blue { background: #0C447C; color: #B5D4F4; }
        body.dark .tag-green { background: #27500A; color: #C0DD97; }
        body.dark .tag-red { background: #791F1F; color: #F7C1C1; }

        /* ── NOTIFICATION PANEL ── */
        .notif-panel {
            position: fixed; top: 60px; right: 0;
            width: 340px; height: calc(100vh - 60px);
            background: var(--surface);
            border-left: 1px solid var(--border);
            padding: 20px; z-index: 900;
            transform: translateX(100%);
            transition: transform 0.25s ease;
            overflow-y: auto;
        }
        .notif-panel.open { transform: translateX(0); }
        .notif-item {
            display: flex; gap: 12px; padding: 12px 0;
            border-bottom: 1px solid var(--border);
        }
        .notif-item:last-child { border-bottom: none; }
        .notif-dot {
            width: 8px; height: 8px; border-radius: 50%;
            background: var(--primary); margin-top: 5px; flex-shrink: 0;
        }
        .notif-dot.read { background: var(--text-muted); }
        .notif-text { font-size: 13px; line-height: 1.5; }
        .notif-time { font-size: 11px; color: var(--text-muted); margin-top: 2px; }

        /* ── CHAT ── */
        .chat-wrap {
            display: flex; flex-direction: column;
            height: 540px; border: 1px solid var(--border);
            border-radius: var(--radius); overflow: hidden;
            background: var(--surface);
        }
        .chat-header {
            padding: 14px 20px;
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center; gap: 10px;
            background: var(--surface2);
        }
        .ai-avatar {
            width: 32px; height: 32px; border-radius: 50%;
            background: var(--primary); display: flex;
            align-items: center; justify-content: center;
            color: #fff; font-size: 14px;
        }
        .chat-messages {
            flex: 1; overflow-y: auto; padding: 20px;
            display: flex; flex-direction: column; gap: 14px;
            background: var(--bg);
        }
        .msg { max-width: 78%; padding: 11px 15px; border-radius: 12px; font-size: 14px; line-height: 1.5; }
        .msg.bot {
            background: var(--surface); border: 1px solid var(--border);
            align-self: flex-start; border-bottom-left-radius: 3px;
        }
        .msg.user {
            background: var(--primary); color: #fff;
            align-self: flex-end; border-bottom-right-radius: 3px;
        }
        .msg.typing { color: var(--text-muted); font-style: italic; }
        .chat-input-row {
            display: flex; gap: 10px; padding: 14px 16px;
            border-top: 1px solid var(--border); background: var(--surface);
        }
        .chat-input-row input { margin: 0; }

        /* ── TIMETABLE ── */
        .timetable-grid {
            display: grid;
            grid-template-columns: 80px repeat(5, 1fr);
            gap: 2px; font-size: 12px;
        }
        .tt-header {
            background: var(--primary); color: #fff;
            padding: 8px; text-align: center;
            border-radius: 6px; font-weight: 600;
        }
        .tt-time {
            background: var(--surface2);
            padding: 8px; border-radius: 6px;
            text-align: center; color: var(--text-muted);
            font-weight: 500; display: flex; align-items: center; justify-content: center;
        }
        .tt-cell {
            min-height: 52px; border-radius: 6px;
            padding: 6px 8px; cursor: pointer; transition: 0.15s;
        }
        .tt-cell.empty { background: var(--surface2); border: 1px dashed var(--border); }
        .tt-cell.empty:hover { background: var(--surface); border-style: solid; }
        .tt-cell.filled { background: #80000015; border: 1px solid #80000030; }
        .tt-cell.filled:hover { background: #80000025; }
        .tt-cell .mod-code { font-weight: 700; color: var(--primary); font-size: 11px; }
        .tt-cell .mod-room { color: var(--text-muted); font-size: 10px; margin-top: 2px; }

        /* ── GPA ── */
        .gpa-display {
            text-align: center; padding: 32px 0;
        }
        .gpa-ring {
            width: 140px; height: 140px;
            border-radius: 50%; margin: 0 auto 16px;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            background: conic-gradient(var(--primary) 0deg, var(--primary) var(--gpa-deg, 0deg), var(--surface2) var(--gpa-deg, 0deg));
            position: relative;
        }
        .gpa-inner {
            width: 110px; height: 110px; border-radius: 50%;
            background: var(--surface); display: flex;
            flex-direction: column; align-items: center; justify-content: center;
        }
        .gpa-num { font-size: 32px; font-weight: 700; color: var(--primary); }
        .gpa-sub { font-size: 12px; color: var(--text-muted); }
        .module-row {
            display: grid; grid-template-columns: 1fr 100px 100px 80px;
            gap: 10px; align-items: center;
            padding: 10px 0; border-bottom: 1px solid var(--border);
        }
        .module-row:last-child { border-bottom: none; }
        .grade-input { width: 100%; }

        /* ── COMMUNITY ── */
        .post-card {
            padding: 16px 0; border-bottom: 1px solid var(--border);
        }
        .post-card:last-child { border-bottom: none; }
        .post-meta {
            display: flex; justify-content: space-between;
            align-items: center; margin-bottom: 8px;
            gap: 8px;
            flex-wrap: wrap;
        }
        .author-chip {
            display: flex; align-items: center; gap: 8px; font-size: 13px; font-weight: 600;
        }
        .avatar-sm {
            width: 28px; height: 28px; border-radius: 50%;
            background: var(--primary); color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 11px; font-weight: 700;
        }
        .post-actions { display: flex; gap: 12px; margin-top: 10px; }
        .post-action-btn {
            background: none; border: none; color: var(--text-muted);
            font-size: 13px; cursor: pointer; display: flex;
            align-items: center; gap: 5px; padding: 4px 0;
            font-family: inherit; transition: 0.15s;
        }
        .post-action-btn:hover { color: var(--primary); }

        /* ── ADMIN ── */
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th { text-align: left; padding: 10px 12px; color: var(--text-muted); font-weight: 600; border-bottom: 1px solid var(--border); }
        td { padding: 12px; border-bottom: 1px solid var(--border); }
        .action-btn { padding: 5px 12px; border: none; border-radius: 6px; color: #fff; font-size: 12px; font-weight: 600; cursor: pointer; margin-right: 4px; font-family: inherit; }
        .btn-del { background: var(--danger); }
        .btn-approve { background: var(--success); }

        /* ── PROFILE ── */
        .profile-hero {
            display: flex; align-items: center; gap: 20px;
            flex-wrap: wrap;
        }
        .profile-avatar {
            width: 80px; height: 80px; border-radius: 50%;
            background: var(--primary); color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 28px; font-family: 'Playfair Display', serif;
            flex-shrink: 0;
        }

        /* ── ACADEMIC SEARCH ── */
        .module-result {
            padding: 14px; border-radius: 10px;
            background: var(--surface2); border: 1px solid var(--border);
            margin-bottom: 10px;
        }
        .module-result h4 { font-size: 14px; margin-bottom: 4px; }
        .module-result p { font-size: 13px; color: var(--text-muted); }

        /* ── HOME HERO ── */
        .hero {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 56px 40px;
            text-align: center;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute; top: -60px; right: -60px;
            width: 240px; height: 240px;
            background: radial-gradient(circle, #80000018 0%, transparent 70%);
            border-radius: 50%;
        }
        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 40px; color: var(--primary); margin-bottom: 12px;
        }
        .hero p { font-size: 16px; color: var(--text-muted); max-width: 560px; margin: 0 auto 28px; }

        /* Quick search bar */
        .quick-search {
            display: flex; max-width: 480px; margin: 0 auto; gap: 8px;
        }
        .quick-search input { margin: 0; flex: 1; }

        /* Calendar date cell transitions */
        .cal-date-cell {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .cal-date-cell:hover {
            background: var(--surface2) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        .grid-4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }
        .menu-toggle { display: none; }

        @media (max-width: 992px) {
            header { padding: 0 16px; }
            .menu-toggle { display: inline-flex; }
            aside {
                position: fixed;
                left: 0;
                top: 60px;
                bottom: 0;
                width: min(82vw, 280px);
                z-index: 1000;
                transform: translateX(-100%);
                transition: transform 0.25s ease;
                box-shadow: 0 10px 30px rgba(0,0,0,0.16);
            }
            body.mobile-nav-open::before {
                content: '';
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.35);
                z-index: 900;
            }
            body.mobile-nav-open aside {
                transform: translateX(0);
            }
            main {
                padding: 20px 16px;
                max-width: 100%;
            }
            .notif-panel { width: min(100vw, 360px); }
        }

        @media (max-width: 768px) {
            .topbar-right .auth-btn span { display: none; }
            .topbar-right .auth-btn { padding: 0 12px; }
            .logo { font-size: 17px; }
            .hero { padding: 32px 20px; }
            .post-meta {
                flex-direction: column;
                align-items: flex-start;
            }
            .post-actions {
                flex-wrap: wrap;
            }
            .profile-hero {
                flex-direction: column;
                align-items: flex-start;
            }
            .hero h1 { font-size: 30px; }
            .quick-search { flex-direction: column; }
            .grid-4,
            .grid-3,
            .grid-2 {
                grid-template-columns: 1fr;
            }
            .card,
            .stat-card {
                padding: 16px;
            }
            .setting-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
            .profile-hero,
            .profile-hero > div {
                flex-direction: column;
                align-items: flex-start;
            }
            .chat-input-row,
            .chat-header {
                flex-wrap: wrap;
            }
            .chat-wrap {
                height: auto;
                min-height: 540px;
            }
            #peerChatWrap {
                flex-direction: column !important;
                height: auto !important;
                min-height: 520px;
            }
            #peerChatWrap > div:first-child {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid var(--border);
                max-height: 260px;
            }
            #peerChatWrap > div:last-child {
                min-height: 360px;
            }
            .module-row {
                grid-template-columns: 1fr 70px 70px 60px;
                font-size: 12px;
            }
            .notif-panel {
                width: 100%;
                top: 60px;
                height: calc(100vh - 60px);
            }
            .timetable-grid {
                min-width: 560px;
            }
            .timetable-grid-wrapper {
                overflow-x: auto;
            }
            .modal-card,
            #modalOverlay > div,
            #authModalOverlay > div,
            #reportModalOverlay > div,
            #studentWarningDetailModalOverlay > div,
            #adminWarnModalOverlay > div {
                width: min(92vw, 440px);
                padding: 20px;
            }
        }

        @media (max-width: 560px) {
            header { height: 56px; }
            aside { top: 56px; height: calc(100vh - 56px); }
            .logo { font-size: 16px; }
            .nav-item { padding: 10px 12px; font-size: 13px; }
            .hero h1 { font-size: 26px; }
            .hero p { font-size: 15px; }
            .btn { width: 100%; justify-content: center; }
            .quick-search .btn { width: auto; }
            .grid-4,
            .grid-3,
            .grid-2 {
                gap: 12px;
            }
            .stat-num { font-size: 24px; }
            .module-row {
                grid-template-columns: 1fr;
                gap: 4px;
            }
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(46, 204, 113, 0.4); }
            70% { box-shadow: 0 0 0 8px rgba(46, 204, 113, 0); }
            100% { box-shadow: 0 0 0 0 rgba(46, 204, 113, 0); }
        }
    </style>