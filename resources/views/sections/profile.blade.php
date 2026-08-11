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