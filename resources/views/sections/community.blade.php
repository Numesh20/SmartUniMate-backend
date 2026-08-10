<!-- COMMUNITY -->
<div class="section" id="community">
    <h2 class="page-title">Student Community</h2>
    <div class="card">
        <textarea id="postContent" rows="3" placeholder="Share a tip, ask a question, or post an update..."></textarea>
        <div id="imagePreviewRow" style="display:none;margin-top:8px;position:relative;">
            <img id="postImagePreview" src="" alt="preview" style="max-height:150px;border-radius:8px;">
            <button class="icon-btn" onclick="removePostImage()" style="position:absolute;top:4px;right:4px;background:rgba(0,0,0,0.6);color:#fff;border-radius:50%;width:24px;height:24px;font-size:12px;"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div style="display:flex;gap:8px;margin-top:8px;align-items:center;flex-wrap:wrap;">
            <select id="postCategory" style="width:auto;margin:0;font-size:13px;">
                <option>Boarding & Accommodation</option>
                <option>Academic Help</option>
                <option>Campus Life</option>
                <option>Announcements</option>
                <option>General</option>
            </select>
            <input type="file" id="postImageInput" accept="image/*" style="display:none;" onchange="previewPostImage(event)">
            <button class="btn btn-outline" style="font-size:12px;" onclick="document.getElementById('postImageInput').click()"><i class="fa-solid fa-image"></i> Image</button>
            <button class="btn btn-primary" style="margin-left:auto;" onclick="submitPost()">Post</button>
        </div>
    </div>
    <div class="card">
        <div style="display:flex;gap:8px;margin-bottom:16px;flex-wrap:wrap;">
            <button class="btn btn-outline" style="font-size:12px;" onclick="filterPosts('All')">All</button>
            <button class="btn btn-outline" style="font-size:12px;" onclick="filterPosts('Boarding & Accommodation')">Boarding & Accommodation</button>
            <button class="btn btn-outline" style="font-size:12px;" onclick="filterPosts('Academic Help')">Academic Help</button>
            <button class="btn btn-outline" style="font-size:12px;" onclick="filterPosts('Campus Life')">Campus Life</button>
            <button class="btn btn-outline" style="font-size:12px;" onclick="filterPosts('Announcements')">Announcements</button>
            <button class="btn btn-outline" style="font-size:12px;" onclick="filterPosts('General')">General</button>
        </div>
        <div id="feedContainer"></div>
    </div>
</div>

<!-- ADMIN -->
<div class="section" id="admin">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:24px;">
        <div>
            <h2 class="page-title" style="color:var(--danger);margin:0;">Admin Panel</h2>
            <div style="font-size:13px;color:var(--text-muted);">Manage content, moderate posts and view your account</div>
        </div>
    </div>
    <div style="display:flex;gap:12px;margin-bottom:24px;overflow-x:auto;padding-bottom:4px;" id="adminSubNav">
        <button class="btn btn-primary" onclick="switchAdminTab('dashboard')" style="border-radius:20px;padding:6px 16px;font-size:13px;background:var(--danger);border-color:var(--danger);" data-tab="dashboard"><i class="fa-solid fa-chart-line"></i> Dashboard</button>
        <button class="btn btn-outline" onclick="switchAdminTab('modules')" style="border-radius:20px;padding:6px 16px;font-size:13px;" data-tab="modules"><i class="fa-solid fa-book-open"></i> Syllabus Catalog</button>
        <button class="btn btn-outline" onclick="switchAdminTab('reports')" style="border-radius:20px;padding:6px 16px;font-size:13px;" data-tab="reports"><i class="fa-solid fa-triangle-exclamation"></i> Complaints</button>
        <button class="btn btn-outline" onclick="switchAdminTab('profile')" style="border-radius:20px;padding:6px 16px;font-size:13px;" data-tab="profile"><i class="fa-solid fa-user-shield"></i> Admin Profile</button>
        <button class="btn btn-outline" onclick="switchAdminTab('settings')" style="border-radius:20px;padding:6px 16px;font-size:13px;" data-tab="settings"><i class="fa-solid fa-gear"></i> Settings</button>
    </div>

    <!-- DASHBOARD -->
    <div id="adminView-dashboard" class="admin-view">
        <div class="grid-3" style="margin-bottom:20px;">
            <div class="stat-card"><div class="stat-num" id="adminTotalPosts">0</div><div class="stat-label">Total Posts</div></div>
            <div class="stat-card"><div class="stat-num" id="adminTotalNews">0</div><div class="stat-label">News Articles</div></div>
            <div class="stat-card"><div class="stat-num" id="adminTotalKB">0</div><div class="stat-label">KB Resources</div></div>
        </div>
        <div class="card">
            <h3 class="section-title">Community Posts — Moderation Queue</h3>
            <div style="overflow-x:auto;">
                <table>
                    <thead><tr><th>Student</th><th>Content</th><th>Category</th><th>Date</th><th>Action</th></tr></thead>
                    <tbody id="modTable">
                        <tr><td colspan="5" style="text-align:center;color:var(--text-muted);">Loading posts...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="grid-2">
            <div class="card">
                <h3 class="section-title">Post Campus News</h3>
                <div class="form-group"><label>Title</label><input type="text" id="adminNewsTitle" placeholder="e.g. Exam Schedule Released"></div>
                <div class="form-group"><label>Category</label>
                    <select id="adminNewsCat">
                        <option value="1">Academic</option>
                        <option value="2">Events</option>
                        <option value="3">General</option>
                    </select>
                </div>
                <div class="form-group"><label>Content</label><textarea id="adminNewsContent" rows="3" placeholder="Enter full announcement..."></textarea></div>
                <button class="btn btn-primary" style="background:var(--danger);" onclick="submitAdminNews()"><i class="fa-solid fa-paper-plane"></i> Publish News</button>
            </div>
            <div class="card">
                <h3 class="section-title">Add Knowledge Base Resource</h3>
                <div class="form-group"><label>Title</label><input type="text" id="adminKbTitle" placeholder="e.g. Thesis Guidelines"></div>
                <div class="grid-2">
                    <div class="form-group"><label>Category</label><input type="text" id="adminKbCat" placeholder="e.g. Guidelines"></div>
                    <div class="form-group"><label>Source</label><input type="text" id="adminKbSource" placeholder="e.g. IT Faculty"></div>
                </div>
                <div class="grid-2">
                    <div class="form-group"><label>URL (Optional)</label><input type="text" id="adminKbUrl" placeholder="https://..."></div>
                    <div class="form-group">
                        <label>Attachment File (Optional)</label>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <input type="file" id="adminKbFile" accept=".pdf,.doc,.docx,.ppt,.pptx,.txt" style="display:none;" onchange="document.getElementById('adminKbFileName').textContent = this.files[0] ? this.files[0].name : 'No file selected'">
                            <button class="btn btn-outline" style="font-size:12px;margin:0;" onclick="document.getElementById('adminKbFile').click()"><i class="fa-solid fa-file-pdf"></i> Select File</button>
                            <span id="adminKbFileName" style="font-size:12px;color:var(--text-muted);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:150px;">No file selected</span>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" style="background:var(--danger);width:100%;margin-top:10px;" id="adminKbSubmitBtn" onclick="submitAdminKB()"><i class="fa-solid fa-upload"></i> Upload Resource</button>
            </div>
        </div>
    </div>

    <!-- MODULES CATALOG -->
    <div id="adminView-modules" class="admin-view" style="display:none;">
        <div class="card">
            <h3 class="section-title">Academic Modules Catalog</h3>
            <div class="grid-2">
                <div class="form-group"><label>Module Code *</label><input type="text" id="adminModCode" placeholder="e.g. IS 4110"></div>
                <div class="form-group"><label>Module Name *</label><input type="text" id="adminModName" placeholder="e.g. Advanced Web Dev"></div>
            </div>
            <div class="grid-2">
                <div class="form-group"><label>Credits *</label><input type="number" id="adminModCredits" placeholder="e.g. 3"></div>
                <div class="form-group"><label>Faculty</label><input type="text" id="adminModFaculty" placeholder="e.g. Computing"></div>
            </div>
            <div class="form-group"><label>Prerequisite</label><input type="text" id="adminModPrereq" placeholder="e.g. IS 3110"></div>
            <div class="form-group"><label>Description</label><textarea id="adminModDesc" rows="2" placeholder="Course description..."></textarea></div>
            <button class="btn btn-primary" style="background:var(--danger);width:100%;" onclick="submitAdminModule()"><i class="fa-solid fa-plus"></i> Catalog Module</button>
        </div>
        
        <div class="card" style="margin-top:20px;">
            <h3 class="section-title">Current Modules (<span id="adminModCount">0</span>)</h3>
            <div style="overflow-x:auto;">
                <table>
                    <thead><tr><th>Code</th><th>Name</th><th>Credits</th><th>Faculty</th><th>Action</th></tr></thead>
                    <tbody id="adminModTable">
                        <tr><td colspan="5" style="text-align:center;color:var(--text-muted);">Loading modules...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ADMIN PROFILE -->
    <div id="adminView-profile" class="admin-view" style="display:none;">
        <div class="card" style="display:flex;justify-content:space-between;align-items:center;padding:32px;flex-wrap:wrap;gap:20px;">
            <div style="display:flex;gap:24px;align-items:center;">
                <div style="width:80px;height:80px;border-radius:50%;background:linear-gradient(135deg,var(--danger),#ff6b6b);display:flex;align-items:center;justify-content:center;font-size:32px;color:#fff;">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
                <div>
                    <h3 style="font-size:20px;margin-bottom:4px;" id="adminNameBig">System Administrator</h3>
                    <div style="font-size:13px;color:var(--text-muted);margin-bottom:8px;" id="adminEmailBig">admin@smartunimate.com</div>
                    <div style="margin-bottom:12px;">
                        <span style="background:var(--danger);color:#fff;font-size:11px;font-weight:700;padding:3px 10px;border-radius:20px;letter-spacing:1px;margin-right:8px;">ADMINISTRATOR</span>
                    </div>
                    <button class="btn btn-primary" style="background:var(--danger);border-color:var(--danger);font-size:12px;padding:6px 16px;border-radius:6px;" onclick="toggleAdminProfileEdit()" id="btnAdminProfileEdit"><i class="fa-solid fa-pen"></i> Edit</button>
                </div>
            </div>
            <div style="display:flex;gap:32px;text-align:center;">
                <div><div style="font-size:24px;font-weight:700;color:var(--danger);" id="adminStatPosts">0</div><div style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;">POSTS</div></div>
                <div><div style="font-size:24px;font-weight:700;color:var(--danger);" id="adminStatNews">0</div><div style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;">NEWS</div></div>
                <div><div style="font-size:24px;font-weight:700;color:var(--danger);" id="adminStatKB">0</div><div style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;">RESOURCES</div></div>
            </div>
        </div>
        <div class="card" style="margin-top:20px;">
            <h3 class="section-title">Account Details</h3>
            <div class="grid-2" style="gap:24px;">
                <div class="form-group">
                    <label style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;">Full Name</label>
                    <input type="text" id="adminProfName" disabled>
                </div>
                <div class="form-group">
                    <label style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;">Email Address</label>
                    <input type="email" id="adminProfEmail" disabled>
                </div>
                <div class="form-group">
                    <label style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;">Role</label>
                    <input type="text" value="System Administrator" disabled>
                </div>
                <div class="form-group">
                    <label style="font-size:10px;font-weight:700;color:var(--text-muted);letter-spacing:1px;text-transform:uppercase;">Member Since</label>
                    <input type="text" id="adminMemberSince" disabled>
                </div>
            </div>
            <div style="display:none;margin-top:16px;text-align:right;" id="adminProfSaveRow">
                <button class="btn btn-primary" onclick="saveAdminProfileDetails()">Save Changes</button>
            </div>
        </div>
        <div class="card" style="margin-top:20px;">
            <h3 class="section-title">Change Admin Password</h3>
            <div id="adminPwSuccess" style="color:var(--success);font-size:13px;margin-bottom:12px;display:none;padding:10px;background:rgba(45,122,79,0.1);border-radius:8px;"></div>
            <div id="adminPwError" style="color:var(--danger);font-size:13px;margin-bottom:12px;display:none;padding:10px;background:rgba(192,57,43,0.1);border-radius:8px;"></div>
            <div class="form-group"><label>Current Password</label><input type="password" id="adminCurrPw" placeholder="Enter current password"></div>
            <div class="grid-2">
                <div class="form-group"><label>New Password</label><input type="password" id="adminNewPw" placeholder="At least 8 characters"></div>
                <div class="form-group"><label>Confirm New Password</label><input type="password" id="adminConfPw" placeholder="Repeat new password"></div>
            </div>
            <button class="btn btn-primary" style="background:var(--danger);margin-top:12px;" onclick="changeAdminPassword()"><i class="fa-solid fa-lock"></i> Update Password</button>
        </div>
    </div>

    <!-- ADMIN SETTINGS -->
    <div id="adminView-settings" class="admin-view" style="display:none;">
        <div class="card">
            <h3 class="section-title">Appearance</h3>
            <div class="setting-row">
                <div><div class="setting-label"><i class="fa-solid fa-moon"></i> Dark Mode</div><div class="setting-desc">Switch between light and dark interface</div></div>
                <label class="toggle-switch"><input type="checkbox" id="adminDarkToggle" onchange="toggleThemeAdmin()"><span class="toggle-track"></span></label>
            </div>
            <div class="setting-row">
                <div><div class="setting-label"><i class="fa-solid fa-droplet"></i> Glass Effect</div><div class="setting-desc">Enable frosted-glass blur</div></div>
                <label class="toggle-switch"><input type="checkbox" id="adminGlassToggle" onchange="toggleGlass()"><span class="toggle-track"></span></label>
            </div>
            <div class="setting-row" style="flex-direction:column;align-items:flex-start;gap:12px;">
                <div><div class="setting-label"><i class="fa-solid fa-palette"></i> Color Palette</div><div class="setting-desc">Choose accent color</div></div>
                <div style="display:flex;gap:12px;flex-wrap:wrap;">
                    <div class="palette-swatch" style="background:linear-gradient(135deg,#800000,#a01010);" onclick="setPalette('')" title="Default Maroon"></div>
                    <div class="palette-swatch" style="background:linear-gradient(135deg,#0077b6,#0096c7);" onclick="setPalette('palette-ocean')" title="Ocean Blue"></div>
                    <div class="palette-swatch" style="background:linear-gradient(135deg,#2d6a4f,#40916c);" onclick="setPalette('palette-forest')" title="Forest Green"></div>
                    <div class="palette-swatch" style="background:linear-gradient(135deg,#e76f51,#f4a261);" onclick="setPalette('palette-sunset')" title="Sunset Orange"></div>
                    <div class="palette-swatch" style="background:linear-gradient(135deg,#7b2cbf,#9d4edd);" onclick="setPalette('palette-purple')" title="Royal Purple"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- REPORTS/COMPLAINTS VIEW -->
    <div id="adminView-reports" class="admin-view" style="display:none;">
        <div class="card">
            <h3 class="section-title">Student Complaints & Reports</h3>
            <div style="overflow-x:auto;">
                <table style="width:100%; border-collapse:collapse; font-size:12px; text-align:left;">
                    <thead>
                        <tr style="border-bottom:2px solid var(--border); padding:8px;">
                            <th style="padding:10px;">Reporter</th>
                            <th style="padding:10px;">Reported Entity</th>
                            <th style="padding:10px;">Reason</th>
                            <th style="padding:10px;">Details</th>
                            <th style="padding:10px;">Screenshot</th>
                            <th style="padding:10px;">Status</th>
                            <th style="padding:10px; text-align:center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="adminReportsTableBody">
                        <tr><td colspan="7" style="text-align:center;color:var(--text-muted);padding:20px;">Loading complaints...</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>