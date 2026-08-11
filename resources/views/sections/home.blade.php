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