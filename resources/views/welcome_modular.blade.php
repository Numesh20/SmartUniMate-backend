<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Smart UniMate - Sabaragamuwa University</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    @include('partials.styles')
</head>
<body>

@include('partials.notifications')

@include('partials.header')

<div class="app-shell">
@include('partials.sidebar')

<!-- MAIN -->
<main>

<!-- HOME -->
<div class="section active" id="home">
    <!-- STUDENT HOME VIEW -->
    <div id="student-home-view">
        <div class="hero">
            <h1>Your Digital Campus</h1>
            <p>AI-powered assistant for Sabaragamuwa University students. Get instant answers, manage your schedule, and connect with peers.</p>
            <div class="quick-search">
                <input type="text" placeholder="Search modules, faculty, events..." id="heroSearch" onkeydown="if(event.key==='Enter'){nav('academic');document.getElementById('academicSearch').value=this.value;doSearch();}">
                <button class="btn btn-primary" onclick="nav('academic');document.getElementById('academicSearch').value=document.getElementById('heroSearch').value;doSearch();">Search</button>
            </div>
        </div>
        <div class="grid-3">
            <div class="stat-card">
                <div class="stat-num" id="homeEnrolledModules">0</div>
                <div class="stat-label">Enrolled Modules</div>
            </div>
            <div class="stat-card">
                <div class="stat-num" id="homeGPA">0.00</div>
                <div class="stat-label">Current GPA</div>
            </div>
            <div class="stat-card">
                <div class="stat-num" id="homeClassesThisWeek">0</div>
                <div class="stat-label">Classes This Week</div>
            </div>
        </div>
        <div style="margin-top:20px;" id="homeAlertsContainer">
            <!-- Dynamic alert card will be populated here -->
        </div>
    </div>

    <!-- ADMIN HOME VIEW -->
    <div id="admin-home-view" style="display:none;">
        <div class="hero" style="background: linear-gradient(135deg, #2c3e50, #800000); color: #fff; text-align: left; padding: 40px 32px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.15); margin-bottom: 24px;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px;">
                <div>
                    <span style="background:rgba(255,255,255,0.15); font-size:11px; font-weight:700; padding:4px 12px; border-radius:20px; letter-spacing:1px; text-transform:uppercase;">Admin Portal</span>
                    <h1 style="color:#fff; font-size:32px; margin-top:8px; margin-bottom:4px; font-family:'Playfair Display', serif;" id="adminHomeWelcomeName">Welcome, Administrator</h1>
                    <p style="color:rgba(255,255,255,0.85); font-size:14px; max-width:100%; margin:0;">Manage the campus database, add syllabus modules, review posts, and broadcast announcements.</p>
                </div>
                <div style="background:rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); padding: 12px 20px; border-radius: 12px; backdrop-filter: blur(8px);">
                    <div style="font-size:11px; text-transform:uppercase; letter-spacing:1px; color:rgba(255,255,255,0.6);">System Status</div>
                    <div style="font-weight:600; font-size:14px; margin-top:4px; display:flex; align-items:center; gap:6px;">
                        <span style="width:10px; height:10px; background:#2ecc71; border-radius:50%; display:inline-block; animation: pulse 2s infinite;"></span>
                        Services Active
                    </div>
                </div>
            </div>
        </div>

        <!-- Admin Quick Stats -->
        <div class="grid-4" style="margin-bottom: 24px;">
            <div class="stat-card" style="cursor:pointer;" onclick="nav('admin'); switchAdminTab('modules');">
                <div class="stat-num" id="adminHomeTotalModules" style="color: var(--primary);">0</div>
                <div class="stat-label" style="font-weight:600;"><i class="fa-solid fa-book-open"></i> Syllabus Modules</div>
            </div>
            <div class="stat-card" style="cursor:pointer;" onclick="nav('admin'); switchAdminTab('dashboard');">
                <div class="stat-num" id="adminHomeTotalPosts" style="color: var(--secondary);">0</div>
                <div class="stat-label" style="font-weight:600;"><i class="fa-solid fa-users"></i> Community Posts</div>
            </div>
            <div class="stat-card" style="cursor:pointer;" onclick="nav('admin'); switchAdminTab('dashboard');">
                <div class="stat-num" id="adminHomeTotalNews" style="color: var(--success);">0</div>
                <div class="stat-label" style="font-weight:600;"><i class="fa-solid fa-newspaper"></i> Campus News</div>
            </div>
            <div class="stat-card" style="cursor:pointer;" onclick="nav('admin'); switchAdminTab('dashboard');">
                <div class="stat-num" id="adminHomeTotalKB" style="color: #7b2cbf;">0</div>
                <div class="stat-label" style="font-weight:600;"><i class="fa-solid fa-book"></i> KB Resources</div>
            </div>
        </div>

        <div class="grid-2">
            <!-- Left Side: Quick Academic Module Cataloger -->
            <div class="card">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; border-bottom:1px solid var(--border); padding-bottom:10px;">
                    <h3 class="section-title" style="margin:0; display:flex; align-items:center; gap:8px; color:var(--primary); font-size:16px;">
                        <i class="fa-solid fa-folder-plus"></i> Quick Module Cataloger
                    </h3>
                    <span style="font-size:11px; color:var(--text-muted);">Syllabus Entry Form</span>
                </div>
                <div class="grid-2">
                    <div class="form-group">
                        <label>Module Code *</label>
                        <input type="text" id="adminHomeModCode" placeholder="e.g. IS 4110">
                    </div>
                    <div class="form-group">
                        <label>Module Name *</label>
                        <input type="text" id="adminHomeModName" placeholder="e.g. Advanced Web Development">
                    </div>
                </div>
                <div class="grid-2">
                    <div class="form-group">
                        <label>Credits *</label>
                        <input type="number" id="adminHomeModCredits" placeholder="e.g. 3">
                    </div>
                    <div class="form-group">
                        <label>Faculty</label>
                        <input type="text" id="adminHomeModFaculty" placeholder="e.g. Computing">
                    </div>
                </div>
                <div class="form-group">
                    <label>Prerequisite</label>
                    <input type="text" id="adminHomeModPrereq" placeholder="e.g. IS 3110 (Optional)">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="adminHomeModDesc" rows="2" placeholder="Course description, goals, and learning outcomes..."></textarea>
                </div>
                <button class="btn btn-primary" style="background:var(--danger); border-color:var(--danger); width:100%; display:flex; align-items:center; justify-content:center; gap:8px;" onclick="submitAdminModuleHome()">
                    <i class="fa-solid fa-plus"></i> Catalog Module & Update Database
                </button>
            </div>

            <!-- Right Side: Quick Broadcast & Moderation Queue -->
            <div style="display:flex; flex-direction:column; gap:20px;">
                <!-- Quick Broadcast / News announcement -->
                <div class="card">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; border-bottom:1px solid var(--border); padding-bottom:10px;">
                        <h3 class="section-title" style="margin:0; display:flex; align-items:center; gap:8px; color:var(--secondary); font-size:16px;">
                            <i class="fa-solid fa-bullhorn"></i> Campus Announcement
                        </h3>
                        <span style="font-size:11px; color:var(--text-muted);">Quick Broadcast</span>
                    </div>
                    <div class="form-group">
                        <label>Announcement Title</label>
                        <input type="text" id="adminHomeNewsTitle" placeholder="e.g. Exam Schedule Released for Year 4">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select id="adminHomeNewsCat">
                            <option value="1">Academic Updates</option>
                            <option value="2">Campus Events</option>
                            <option value="3">General Announcements</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Announcement Message</label>
                        <textarea id="adminHomeNewsContent" rows="2" placeholder="Write full announcement details here..."></textarea>
                    </div>
                    <button class="btn btn-primary" style="background:var(--primary); border-color:var(--primary); width:100%; display:flex; align-items:center; justify-content:center; gap:8px;" onclick="submitAdminNewsHome()">
                        <i class="fa-solid fa-paper-plane"></i> Publish to Campus Bulletin
                    </button>
                </div>

                <!-- Moderation Feed Widget -->
                <div class="card" style="margin-bottom:0;">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; border-bottom:1px solid var(--border); padding-bottom:10px;">
                        <h3 class="section-title" style="margin:0; display:flex; align-items:center; gap:8px; color:var(--danger); font-size:16px;">
                            <i class="fa-solid fa-shield-halved"></i> Community Moderation
                        </h3>
                        <span style="font-size:11px; color:var(--text-muted);" id="adminHomeModQueueCount">0 items pending</span>
                    </div>
                    <div id="adminHomeModList" style="display:flex; flex-direction:column; gap:10px; max-height:220px; overflow-y:auto; padding-right:4px;">
                        <!-- Populate dynamically with recent posts -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AI CHAT -->
<div class="section" id="chatbot">
    <h2 class="page-title">AI Chat Assistant & Student Messenger</h2>

    <!-- CHAT TOGGLE TABS -->
    <div style="display:flex;gap:8px;margin-bottom:16px;">
        <button id="btnAiChatTab" class="btn btn-primary" onclick="switchChatTab('ai')" style="font-size:12px;padding:6px 16px;border-radius:20px;margin:0;">
            <i class="fa-solid fa-robot"></i> UniMate AI
        </button>
        <button id="btnPeerChatTab" class="btn btn-outline" onclick="switchChatTab('peer')" style="font-size:12px;padding:6px 16px;border-radius:20px;margin:0;">
            <i class="fa-solid fa-comments"></i> Student Chat
        </button>
    </div>

    <!-- AI CHAT WRAPPER -->
    <div id="aiChatWrap" class="chat-wrap">

        <!-- HEADER -->
        <div class="chat-header">
            <div class="ai-avatar">
                <i class="fa-solid fa-robot" style="font-size:13px;"></i>
            </div>

            <div>
                <div style="font-size:14px;font-weight:600;">UniMate AI</div>
                <div style="font-size:11px;color:var(--text-muted);">
                    Powered by Claude · RAG-enhanced
                </div>
            </div>

            <button class="btn btn-outline"
                style="margin-left:auto;font-size:12px;padding:5px 10px;"
                onclick="clearChat()">
                Clear
            </button>
        </div>

        <!-- MESSAGES -->
        <div class="chat-messages" id="chatBox"
            style="height:420px;overflow-y:auto;padding:12px;display:flex;flex-direction:column;gap:10px;">

            <div class="msg bot">
                👋 Hello! I'm UniMate, powered by Claude AI and SUSL knowledge base.
                Ask me about modules, timetables, faculty contacts, or campus life!
            </div>

        </div>

        <!-- INPUT -->
        <div class="chat-input-row" style="display:flex;gap:8px;padding:10px;border-top:1px solid #eee;">

            <input type="text"
                id="chatInput"
                placeholder="Ask about IS 4110, library hours, exam schedules..."
                style="flex:1;padding:10px;border:1px solid #ddd;border-radius:10px;"
                onkeydown="if(event.key==='Enter') sendChat()">

            <button class="btn btn-primary" onclick="sendChat()">
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </div>
    </div>

    <!-- PEER CHAT WRAPPER -->
    <div id="peerChatWrap" class="chat-wrap" style="display:none; flex-direction:row; height:500px; border:1px solid var(--border); border-radius:12px; overflow:hidden;">
        <!-- Left Sidebar: Search & Active Contacts -->
        <div style="width:280px; border-right:1px solid var(--border); display:flex; flex-direction:column; background:rgba(0,0,0,0.015); height:100%;">
            <!-- Search -->
            <div style="padding:12px; border-bottom:1px solid var(--border); position:relative;">
                <div style="position:relative; display:flex; align-items:center;">
                    <i class="fa-solid fa-magnifying-glass" style="position:absolute; left:12px; color:var(--text-muted); font-size:12px;"></i>
                    <input type="text" id="peerSearchInput" placeholder="Search Index or Name..." 
                           style="width:100%; padding:8px 8px 8px 32px; font-size:12px; border:1px solid var(--border); border-radius:10px; margin:0;"
                           oninput="doPeerSearch()">
                </div>
                <!-- Dropdown overlay -->
                <div id="peerSearchResults" style="display:none; position:absolute; left:12px; right:12px; top:54px; background:var(--card-bg); border:1px solid var(--border); border-radius:10px; box-shadow:0 4px 16px rgba(0,0,0,0.08); z-index:100; max-h:200px; overflow-y:auto;">
                </div>
            </div>
            <!-- Contact List -->
            <div style="flex:1; overflow-y:auto; padding:8px; display:flex; flex-direction:column; gap:6px;">
                <div style="font-size:10px; color:var(--text-muted); font-weight:700; text-transform:uppercase; tracking-wider; padding:4px 8px; margin-bottom:4px;">Conversations</div>
                <div id="peerThreadsContainer" style="display:flex; flex-direction:column; gap:4px;">
                    <p style="font-size:11px; color:var(--text-muted); text-align:center; padding:20px 0;">No active chats.</p>
                </div>
            </div>
        </div>

        <!-- Right Side: Chat Box -->
        <div style="flex:1; display:flex; flex-direction:column; height:100%; background:#fcfbf9; position:relative;">
            <!-- Empty State -->
            <div id="peerChatEmptyState" style="flex:1; display:flex; flex-direction:column; align-items:center; justify-content:center; padding:30px; text-align:center; color:var(--text-muted);">
                <div style="width:48px; height:48px; border-radius:50%; background:rgba(0,0,0,0.03); display:flex; align-items:center; justify-content:center; margin-bottom:12px; border:1px solid var(--border);">
                    <i class="fa-regular fa-comments" style="font-size:20px; color:var(--text-muted);"></i>
                </div>
                <h4 style="font-size:14px; font-weight:700; margin:0 0 4px 0; color:var(--text);">Select a Student</h4>
                <p style="font-size:11px; max-width:240px; margin:4px 0 0 0; line-height:1.4;">Search by Index Number (e.g. 22FIS0580) or Name on the left to start a conversation.</p>
            </div>

            <!-- Active Chat Frame -->
            <div id="peerChatActiveFrame" style="display:none; flex-direction:column; height:100%; width:100%;">
                <!-- Header -->
                <div style="padding:10px 16px; border-bottom:1px solid var(--border); background:var(--card-bg); display:flex; align-items:center; justify-content:space-between; flex-shrink:0;">
                    <div style="display:flex; align-items:center; gap:10px;">
                        <div id="peerActiveAvatar" style="width:34px; height:34px; border-radius:50%; background:rgba(128,0,0,0.1); color:#800000; font-weight:700; display:flex; align-items:center; justify-content:center; font-size:12px; border:1px solid var(--border);"></div>
                        <div style="text-align:left;">
                            <div id="peerActiveName" style="font-size:13px; font-weight:700; color:var(--text); line-height:1.2;"></div>
                            <div id="peerActiveId" style="font-size:10px; color:var(--text-muted);"></div>
                        </div>
                    </div>
                    <button class="btn btn-outline" style="border-color:var(--danger); color:var(--danger); font-size:11px; padding:4px 8px; margin:0;" onclick="openReportPeerModal()">
                        <i class="fa-solid fa-triangle-exclamation"></i> Report
                    </button>
                </div>

                <!-- Messages area -->
                <div id="peerChatMessagesBox" style="flex:1; overflow-y:auto; padding:16px; display:flex; flex-direction:column; gap:12px; background:#fafaf9;">
                </div>

                <!-- Attachment Chip -->
                <div id="peerFilePreviewChip" style="display:none; justify-content:space-between; align-items:center; padding:8px 16px; background:rgba(0,0,0,0.04); border-top:1px solid var(--border); font-size:11px; flex-shrink:0;">
                    <div style="display:flex; align-items:center; gap:6px; color:var(--text); font-weight:600; min-width:0;">
                        <i class="fa-solid fa-paperclip" style="color:#800000;"></i>
                        <span id="peerFilePreviewName" style="text-overflow:ellipsis; overflow:hidden; white-space:nowrap; max-width:260px;"></span>
                    </div>
                    <button onclick="clearSelectedPeerFile()" style="background:none; border:none; color:var(--danger); cursor:pointer; padding:2px;"><i class="fa-solid fa-xmark"></i></button>
                </div>

                <!-- Input Row -->
                <div style="padding:10px 16px; border-top:1px solid var(--border); background:var(--card-bg); display:flex; gap:10px; align-items:center; flex-shrink:0;">
                    <input type="file" id="peerFileInput" style="display:none;" onchange="handlePeerFileSelect()">
                    <button class="btn btn-outline" style="padding:10px; min-width:unset; margin:0; border-radius:10px;" onclick="document.getElementById('peerFileInput').click()">
                        <i class="fa-solid fa-paperclip" style="font-size:14px; color:var(--text-muted);"></i>
                    </button>
                    <input type="text" id="peerMessageInput" placeholder="Type a message..." style="flex:1; padding:10px 14px; border:1px solid var(--border); border-radius:10px; margin:0; font-size:12px;" onkeydown="if(event.key==='Enter') sendPeerMessage()">
                    <button class="btn btn-primary" id="peerSendBtn" onclick="sendPeerMessage()" style="padding:10px 14px; min-width:unset; margin:0; border-radius:10px;">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- QUICK CHIPS -->
    <div style="margin-top:12px;display:flex;gap:8px;flex-wrap:wrap;">

        <button class="btn btn-outline" onclick="quickAsk('What modules are in Year 4 IS?')">
            📘 Year 4 modules
        </button>

        <button class="btn btn-outline" onclick="quickAsk('When is the library open?')">
            🕘 Library hours
        </button>

        <button class="btn btn-outline" onclick="quickAsk('Who is the HOD of IS department?')">
            🏛️ IS Department HOD
        </button>

        <button class="btn btn-outline" onclick="quickAsk('What are the capstone project guidelines?')">
            🎓 Capstone guidelines
        </button>

    </div>
</div>

<!-- CAMPUS NEWS -->
<div class="section" id="news">
    <h2 class="page-title">Campus News & Announcements</h2>
    <div class="grid-2" id="newsGrid">
        <!-- Fetched from backend -->
    </div>
</div>

<!-- KNOWLEDGE BASE -->
<div class="section" id="kb">
    <h2 class="page-title">Knowledge Base & Resources</h2>
    <div class="card">
        <div style="display:flex;gap:10px;">
            <input type="text" id="kbSearch" placeholder="Search guidelines, policies..." style="margin:0;" onkeyup="filterKB()">
        </div>
    </div>
    <div id="kbContainer" style="display:flex;flex-direction:column;gap:12px;">
        <!-- Fetched from backend -->
    </div>
</div>

<!-- ACADEMIC -->
<div class="section" id="academic">
    <h2 class="page-title">Academic Hub</h2>
    <div class="card">
        <div style="display:flex;gap:10px;">
            <input type="text" id="academicSearch" placeholder="Search module code or name (e.g. IS 4110)..." style="margin:0;">
            <button class="btn btn-primary" onclick="doSearch()">Search</button>
        </div>
    </div>
    <div id="searchResults"></div>
    <div class="card" style="margin-top:0;">
        <h3 class="section-title">All Modules — Year 4</h3>
        <div id="allModules"></div>
    </div>
</div>

<!-- TIMETABLE -->
<div class="section" id="timetable">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;">
        <div>
            <h2 class="page-title" style="margin:0;">My Timetable & Calendar</h2>
            <div style="font-size:13px;color:var(--text-muted);">Manage weekly classes, view the calendar, and sync schedules</div>
        </div>
    </div>

    <div class="grid-2" style="gap:24px;align-items:start;">
        <!-- LEFT COLUMN: Grid & Upload -->
        <div style="display:flex;flex-direction:column;gap:24px;">
            <div class="card" style="overflow-x:auto;">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;gap:12px;flex-wrap:wrap;">
                    <h3 class="section-title" style="margin:0;">Weekly Schedule</h3>
                    <div style="display:flex;gap:8px;flex-wrap:wrap;">
                        <button class="btn btn-outline" style="font-size:12px;" onclick="openAddClass()"><i class="fa-solid fa-plus"></i> Add Class</button>
                    </div>
                </div>
                <div class="timetable-grid" id="ttGrid"></div>
            </div>

            <!-- UPLOAD CALENDAR CARD -->
            <div class="card">
                <h3 class="section-title"><i class="fa-solid fa-file-import" style="color:var(--danger);margin-right:8px;"></i> Import Calendar File</h3>
                <p style="font-size:12px;color:var(--text-muted);margin-bottom:16px;">Sync your classes instantly by uploading an iCalendar (`.ics`) file exported from Google Calendar, Outlook, or other timetable schedules.</p>
                <div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap;">
                    <input type="file" id="icsFileInput" accept=".ics" style="display:none;" onchange="handleIcsUpload(event)">
                    <button class="btn btn-primary" style="background:var(--danger);border-color:var(--danger);" onclick="document.getElementById('icsFileInput').click()"><i class="fa-solid fa-cloud-arrow-up"></i> Upload `.ics` File</button>
                    <span style="font-size:12px;color:var(--text-muted);" id="icsUploadStatus">No file chosen</span>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN: Calendar & Today's Classes -->
        <div style="display:flex;flex-direction:column;gap:24px;">
            <!-- INTERACTIVE CALENDAR CARD -->
            <div class="card">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;gap:8px;flex-wrap:wrap;">
                    <h3 class="section-title" style="margin:0;" id="calMonthTitle">May 2026</h3>
                    <div style="display:flex;gap:4px;flex-wrap:wrap;">
                        <button class="icon-btn" onclick="prevMonth()" style="padding:4px 8px;"><i class="fa-solid fa-chevron-left"></i></button>
                        <button class="icon-btn" onclick="nextMonth()" style="padding:4px 8px;"><i class="fa-solid fa-chevron-right"></i></button>
                    </div>
                </div>
                <!-- Mini Calendar Grid -->
                <div id="calGridContainer" style="display:grid;grid-template-columns:repeat(7,1fr);gap:4px;text-align:center;font-size:12px;">
                    <!-- Headers and days will be rendered here -->
                </div>
            </div>

            <!-- TODAY'S CLASSES CARD -->
            <div class="card">
                <h3 class="section-title">Schedule for <span id="scheduleDayTitle">Today</span></h3>
                <div id="todayClasses"></div>
            </div>
        </div>
    </div>
</div>

<!-- GPA CALCULATOR -->
<div class="section" id="gpa">
    <h2 class="page-title">GPA Calculator</h2>
    <div class="grid-2">
        <div class="card">
            <h3 class="section-title">Module Grades</h3>
            <div class="module-row" style="font-weight:600;font-size:12px;color:var(--text-muted);padding-top:0;">
                <span>Module</span><span>Credits</span><span>Grade</span><span>Points</span>
            </div>
            <div id="gpaModules"></div>
            <button class="btn btn-outline" style="margin-top:12px;font-size:13px;width:100%;" onclick="addGpaModule()"><i class="fa-solid fa-plus"></i> Add Module</button>
        </div>
        <div class="card">
            <div class="gpa-display">
                <div class="gpa-ring" id="gpaRing">
                    <div class="gpa-inner">
                        <div class="gpa-num" id="gpaVal">0.00</div>
                        <div class="gpa-sub">GPA / 4.00</div>
                    </div>
                </div>
                <div style="font-size:14px;color:var(--text-muted);margin-top:8px;" id="gpaClass">—</div>
            </div>
            <div class="grid-2" style="gap:10px;">
                <div class="stat-card"><div class="stat-num" id="totalCredits">0</div><div class="stat-label">Total Credits</div></div>
                <div class="stat-card"><div class="stat-num" id="totalPoints">0</div><div class="stat-label">Grade Points</div></div>
            </div>
        </div>
    </div>
</div>

@include('sections.community')

<!-- PROFILE -->
<div class="section" id="profile">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;">
        <div>
            <h2 class="page-title" style="margin:0;">Profile</h2>
            <div style="font-size:13px;color:var(--text-muted);">Manage your account and preferences</div>
        </div>
    </div>

    <!-- Sub Nav -->
    <div style="display:flex;gap:12px;margin-bottom:24px;overflow-x:auto;padding-bottom:4px;" id="profileSubNav">
        <button class="btn btn-primary" onclick="switchProfileTab('profile')" style="border-radius:20px;padding:6px 16px;font-size:13px;background:var(--danger);border-color:var(--danger);" data-tab="profile"><i class="fa-solid fa-user"></i> My Profile</button>
        <button class="btn btn-outline" onclick="switchProfileTab('posts')" style="border-radius:20px;padding:6px 16px;font-size:13px;" data-tab="posts"><i class="fa-regular fa-pen-to-square"></i> My Posts</button>
        <button class="btn btn-outline" onclick="switchProfileTab('chat')" style="border-radius:20px;padding:6px 16px;font-size:13px;" data-tab="chat"><i class="fa-regular fa-comments"></i> Chat History</button>
        <button class="btn btn-outline" onclick="switchProfileTab('notifications')" style="border-radius:20px;padding:6px 16px;font-size:13px;" data-tab="notifications"><i class="fa-regular fa-bell"></i> Notifications</button>
        <button class="btn btn-outline" onclick="switchProfileTab('settings')" style="border-radius:20px;padding:6px 16px;font-size:13px;" data-tab="settings"><i class="fa-solid fa-gear"></i> Settings</button>
    </div>

    <!-- PROFILE VIEW -->
    <div id="profView-profile" class="prof-view">

    <!-- Summary Card -->
    <div class="card" style="display:flex;justify-content:space-between;align-items:center;padding:32px;flex-wrap:wrap;gap:20px;">
        <div style="display:flex;gap:24px;align-items:center;flex-wrap:wrap;">
            <div style="width:80px;height:80px;border-radius:50%;background:#ffe4e1;display:flex;align-items:center;justify-content:center;font-size:40px;" id="profileAvatarBig">
                👨‍🎓
            </div>
            <div>
                <h3 style="font-size:20px;margin-bottom:4px;" id="profileNameBig">User Name</h3>
                <div style="font-size:13px;color:var(--text-muted);margin-bottom:4px;" id="profileIndexBig">Index: N/A · Faculty</div>
                <div style="font-size:12px;color:var(--text-muted);margin-bottom:12px;" id="profileYearBig">Year 1</div>
                <button class="btn btn-primary" style="background:var(--danger);border-color:var(--danger);font-size:12px;padding:6px 16px;border-radius:6px;" onclick="toggleProfileEdit()" id="btnProfileEdit"><i class="fa-solid fa-pen"></i> Edit</button>
            </div>
        </div>
        <div style="display:flex;gap:32px;text-align:center;flex-wrap:wrap;justify-content:center;">
            <div><div style="font-size:24px;font-weight:700;color:var(--danger);" id="statPosts">0</div><div style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;">POSTS</div></div>
            <div><div style="font-size:24px;font-weight:700;color:var(--danger);" id="statQuestions">0</div><div style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;">QUESTIONS</div></div>
            <div><div style="font-size:24px;font-weight:700;color:var(--danger);" id="statComments">0</div><div style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;">COMMENTS</div></div>
        </div>
    </div>

    <!-- Form Grid -->
    <div class="card">
        <div class="grid-2" style="gap:24px;">
            <div class="form-group"><label style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;">Full Name</label><input type="text" id="profName" disabled></div>
            <div class="form-group"><label style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;">Index Number</label><input type="text" id="profId" disabled></div>
            <div class="form-group"><label style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;">University Email</label><input type="email" id="profEmail" disabled></div>
            <div class="form-group"><label style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;">Mobile</label><input type="text" id="profPhone" disabled></div>
            <div class="form-group"><label style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;">Faculty</label><input type="text" id="profFaculty" disabled></div>
            <div class="form-group"><label style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;">Department</label><input type="text" id="profDept" value="Computing & Information Systems" disabled></div>
            <div class="form-group"><label style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;">Year / Semester</label><input type="text" id="profYear" disabled></div>
            <div class="form-group"><label style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;">Hostel Block</label><input type="text" id="profHostel" value="Block B, Room 214" disabled></div>
        </div>
        <div style="display:none;margin-top:16px;text-align:right;" id="profSaveRow">
            <button class="btn btn-primary" onclick="saveProfileDetails()">Save Changes</button>
        </div>
    </div>

    <!-- Recent Posts -->
    <div class="card" style="margin-top:24px;">
        <h3 style="font-size:11px;font-weight:700;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;margin-bottom:16px;">My Recent Posts</h3>
        <div id="profRecentPosts">
            <div style="display:flex;justify-content:space-between;padding:12px 0;border-bottom:1px solid var(--border);">
                <strong style="font-size:14px;">Tips for the IS2030 Database Assignment 📁</strong>
                <span style="font-size:12px;color:var(--text-muted);">Yesterday</span>
            </div>
        </div>
    </div>
    </div> <!-- end profView-profile -->

    <!-- POSTS VIEW -->
    <div id="profView-posts" class="prof-view" style="display:none;">
        <h3 class="section-title">My Posts</h3>
        <div id="profileMyPostsFeed">
            <p style="color:var(--text-muted);font-size:13px;">Loading posts...</p>
        </div>
    </div>

    <!-- CHAT VIEW -->
    <div id="profView-chat" class="prof-view" style="display:none;">
        <h3 class="section-title">Chat History</h3>
        <div class="card" style="max-height:500px;overflow-y:auto;padding:16px;background:var(--surface);">
            <div id="profileChatHistory">
                <p style="color:var(--text-muted);font-size:13px;text-align:center;">Loading chat history...</p>
            </div>
        </div>
    </div>

    <!-- NOTIFICATIONS VIEW -->
    <div id="profView-notifications" class="prof-view" style="display:none;">
        <h3 class="section-title">Notifications</h3>
        <div class="card" id="profileNotificationsList">
            <p style="color:var(--text-muted);font-size:13px;">Loading notifications...</p>
        </div>
    </div>

    <!-- SETTINGS VIEW -->
    <div id="profView-settings" class="prof-view" style="display:none;">
        <!-- Appearance -->
        <div class="card">
            <h3 class="section-title">Appearance</h3>
            <div class="setting-row">
                <div>
                    <div class="setting-label"><i class="fa-solid fa-moon"></i> Dark Mode</div>
                    <div class="setting-desc">Switch between light and dark interface</div>
                </div>
                <label class="toggle-switch"><input type="checkbox" id="settDarkToggle" onchange="toggleThemeFromSettings()"><span class="toggle-track"></span></label>
            </div>
            <div class="setting-row">
                <div>
                    <div class="setting-label"><i class="fa-solid fa-droplet"></i> Glass Effect</div>
                    <div class="setting-desc">Enable frosted-glass blur on cards and panels</div>
                </div>
                <label class="toggle-switch"><input type="checkbox" id="settGlassToggle" onchange="toggleGlass()"><span class="toggle-track"></span></label>
            </div>
            <div class="setting-row" style="flex-direction:column;align-items:flex-start;gap:12px;">
                <div>
                    <div class="setting-label"><i class="fa-solid fa-palette"></i> Color Palette</div>
                    <div class="setting-desc">Choose an accent color for the interface</div>
                </div>
                <div style="display:flex;gap:12px;flex-wrap:wrap;">
                    <div class="palette-swatch" style="background:linear-gradient(135deg,#800000,#a01010);" onclick="setPalette('')" title="Default Maroon"></div>
                    <div class="palette-swatch" style="background:linear-gradient(135deg,#0077b6,#0096c7);" onclick="setPalette('palette-ocean')" title="Ocean Blue"></div>
                    <div class="palette-swatch" style="background:linear-gradient(135deg,#2d6a4f,#40916c);" onclick="setPalette('palette-forest')" title="Forest Green"></div>
                    <div class="palette-swatch" style="background:linear-gradient(135deg,#e76f51,#f4a261);" onclick="setPalette('palette-sunset')" title="Sunset Orange"></div>
                    <div class="palette-swatch" style="background:linear-gradient(135deg,#7b2cbf,#9d4edd);" onclick="setPalette('palette-purple')" title="Royal Purple"></div>
                </div>
            </div>
        </div>

        <!-- Password -->
        <div class="card" style="margin-top:20px;">
            <h3 class="section-title">Change Password</h3>
            <div id="pwSuccessMsg" style="color:var(--success);font-size:13px;margin-bottom:12px;display:none;"></div>
            <div id="pwErrorMsg" style="color:var(--danger);font-size:13px;margin-bottom:12px;display:none;"></div>

            <div class="form-group"><label>Current Password</label><input type="password" id="setCurrPw"></div>
            <div class="grid-2">
                <div class="form-group"><label>New Password</label><input type="password" id="setNewPw"></div>
                <div class="form-group"><label>Confirm</label><input type="password" id="setConfPw"></div>
            </div>
            <button class="btn btn-primary" onclick="submitChangePassword()" style="margin-top:12px;">Update Password</button>
        </div>

        <!-- Danger Zone -->
        <div class="card" style="margin-top:20px;border:1px solid var(--danger);">
            <h3 class="section-title" style="color:var(--danger);">Danger Zone</h3>
            <div class="setting-row">
                <div>
                    <div class="setting-label">Clear All Chat History</div>
                    <div class="setting-desc">Permanently delete all your AI chat messages</div>
                </div>
                <button class="btn btn-outline" style="color:var(--danger);border-color:var(--danger);font-size:12px;" onclick="clearChatHistoryFromSettings()">Clear History</button>
            </div>
        </div>
    </div>
</div>

</main>
</div>

@include('partials.modals')

@include('partials.scripts')
</body>
</html>