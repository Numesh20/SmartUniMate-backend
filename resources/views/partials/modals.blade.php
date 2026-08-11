<!-- ADD CLASS MODAL -->
<div id="modalOverlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:1100;align-items:center;justify-content:center;">
    <div style="background:var(--surface);border-radius:var(--radius);padding:28px;width:400px;max-width:90vw;">
        <h3 style="margin-bottom:18px;font-size:16px;">Add Class to Timetable</h3>
        <div class="form-group"><label>Module Code</label><input type="text" id="mc_code" placeholder="e.g. IS 4110"></div>
        <div class="form-group"><label>Module Name</label><input type="text" id="mc_name" placeholder="e.g. Capstone Project"></div>
        <div class="grid-2">
            <div class="form-group"><label>Day</label><select id="mc_day"><option>Mon</option><option>Tue</option><option>Wed</option><option>Thu</option><option>Fri</option></select></div>
            <div class="form-group"><label>Time Slot</label><select id="mc_slot">
                <option value="0">8:00–9:00</option><option value="1">9:00–10:00</option>
                <option value="2">10:00–11:00</option><option value="3">11:00–12:00</option>
                <option value="4">13:00–14:00</option><option value="5">14:00–15:00</option>
                <option value="6">15:00–16:00</option>
            </select></div>
        </div>
        <div class="form-group"><label>Room</label><input type="text" id="mc_room" placeholder="e.g. Lab 3, E201"></div>
        <div style="display:flex;gap:10px;margin-top:8px;">
            <button class="btn btn-primary" onclick="saveClass()">Save</button>
            <button class="btn btn-outline" onclick="closeModal()">Cancel</button>
        </div>
    </div>
</div>

<!-- AUTH MODAL -->
<div id="authModalOverlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:1100;align-items:center;justify-content:center;">
    <div style="background:var(--surface);border-radius:var(--radius);padding:32px;width:400px;max-width:90vw;position:relative;">
        <button class="icon-btn" style="position:absolute;top:16px;right:16px;" onclick="closeAuthModal()"><i class="fa-solid fa-xmark"></i></button>
        <h3 style="margin-bottom:20px;font-size:20px;font-family:'Playfair Display',serif;color:var(--primary);" id="authTitle">Sign In</h3>
        <div id="authErrorMsg" style="color:var(--danger);font-size:13px;margin-bottom:12px;display:none;"></div>
        
        <div id="loginForm">
            <div class="form-group"><label>Sign in as</label>
                <select id="loginRole">
                    <option value="student">Student</option>
                    <option value="admin">Administrator</option>
                </select>
            </div>
            <div class="form-group"><label>Email Address or Index Number</label><input type="text" id="loginEmail" placeholder="student@susl.lk or 22FIS0100"></div>
            <div class="form-group"><label>Password</label><input type="password" id="loginPassword" placeholder="••••••••"></div>
            <button class="btn btn-primary" style="width:100%;margin-top:8px;" onclick="submitLogin()">Sign In</button>
            <div style="text-align:center;margin-top:16px;font-size:13px;color:var(--text-muted);">
                Don't have an account? <a href="#" style="color:var(--primary);text-decoration:none;font-weight:600;" onclick="toggleAuthMode('register');return false;">Register</a>
                <br><br>
                <a href="#" style="color:var(--primary);text-decoration:none;font-weight:600;" onclick="toggleAuthMode('forgot');return false;">Forgot Password?</a>
            </div>
        </div>

        <div id="registerForm" style="display:none;">
            <div class="form-group"><label>Full Name</label><input type="text" id="regName" placeholder="e.g. John Doe"></div>
            <div class="form-group"><label>Email Address</label><input type="email" id="regEmail" placeholder="student@susl.lk"></div>
            <div class="grid-2">
                <div class="form-group"><label>Student ID *</label><input type="text" id="regStudentId" placeholder="e.g. 22FIS0100"></div>
                <div class="form-group"><label>Year</label>
                    <select id="regYear"><option value="1">Year 1</option><option value="2">Year 2</option><option value="3">Year 3</option><option value="4">Year 4</option></select>
                </div>
            </div>
            <div class="form-group"><label>Faculty/Department</label><input type="text" id="regFaculty" placeholder="e.g. Information Systems"></div>
            <div class="grid-2">
                <div class="form-group"><label>Password</label><input type="password" id="regPassword" placeholder="••••••••"></div>
                <div class="form-group"><label>Confirm</label><input type="password" id="regPasswordConfirm" placeholder="••••••••"></div>
            </div>
            <button class="btn btn-primary" style="width:100%;margin-top:8px;" onclick="submitRegister()">Create Account</button>
            <div style="text-align:center;margin-top:16px;font-size:13px;color:var(--text-muted);">
                Already have an account? <a href="#" style="color:var(--primary);text-decoration:none;font-weight:600;" onclick="toggleAuthMode('login');return false;">Sign In</a>
            </div>
        </div>
        <div id="forgotForm" style="display:none;">
            <p style="font-size:13px;color:var(--text-muted);margin-bottom:16px;">Verify your identity to reset your password.</p>
            <div class="form-group"><label>University Email</label><input type="email" id="forgotEmail" placeholder="student@susl.lk"></div>
            <div class="form-group"><label>Student ID</label><input type="text" id="forgotId" placeholder="e.g. 22FIS0100"></div>
            <div class="grid-2">
                <div class="form-group"><label>New Password</label><input type="password" id="forgotPassword" placeholder="••••••••"></div>
                <div class="form-group"><label>Confirm</label><input type="password" id="forgotConfirm" placeholder="••••••••"></div>
            </div>
            <button class="btn btn-primary" style="width:100%;margin-top:8px;" onclick="submitForgotPassword()">Reset Password</button>
            <div style="text-align:center;margin-top:16px;font-size:13px;color:var(--text-muted);">
                Remembered it? <a href="#" style="color:var(--primary);text-decoration:none;font-weight:600;" onclick="toggleAuthMode('login');return false;">Sign In</a>
            </div>
        </div>
</div>
</div>

<!-- REPORT MODAL -->
<div id="reportModalOverlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:1100;align-items:center;justify-content:center;">
    <div style="background:var(--surface);border-radius:var(--radius);padding:28px;width:400px;max-width:90vw;position:relative;">
        <button class="icon-btn" style="position:absolute;top:16px;right:16px;" onclick="closeReportModal()"><i class="fa-solid fa-xmark"></i></button>
        <h3 style="margin-bottom:18px;font-size:16px;font-family:'Playfair Display',serif;color:var(--primary);">Report Content</h3>
        
        <input type="hidden" id="reportPostId">
        <input type="hidden" id="reportStudentId">
        
        <div class="form-group">
            <label>Reason *</label>
            <select id="reportReason">
                <option value="Inappropriate Content">Inappropriate/Offensive Content</option>
                <option value="Harassment or Abuse">Harassment or Abuse</option>
                <option value="Spam or Scam">Spam or Scam</option>
                <option value="Fake Boarding Info">Fake Boarding/Accommodation Info</option>
                <option value="Other">Other</option>
            </select>
        </div>
        
        <div class="form-group">
            <label>Details & Explanation *</label>
            <textarea id="reportDetails" placeholder="Please provide additional details about this issue..." style="width:100%;height:100px;padding:10px;border:1px solid var(--border);border-radius:10px;font-size:12px;background:var(--bg);color:var(--text);resize:none;box-sizing:border-box;"></textarea>
        </div>
        
        <div class="form-group">
            <label>Upload Screenshot (Optional)</label>
            <input type="file" id="reportScreenshot" accept="image/*" style="width:100%;font-size:11px;">
        </div>
        
        <div style="display:flex;gap:10px;margin-top:16px;">
            <button class="btn btn-primary" onclick="submitReport()">Submit Report</button>
            <button class="btn btn-outline" onclick="closeReportModal()">Cancel</button>
        </div>
    </div>
</div>

<!-- STUDENT WARNING DETAIL MODAL -->
<div id="studentWarningDetailModalOverlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:1200;align-items:center;justify-content:center;backdrop-filter:blur(4px);">
    <div style="background:var(--surface);border-radius:var(--radius);padding:28px;width:450px;max-width:90vw;position:relative;text-align:center;box-shadow:0 10px 25px rgba(0,0,0,0.2);">
        <button class="icon-btn" style="position:absolute;top:16px;right:16px;" onclick="closeStudentWarningModal()"><i class="fa-solid fa-xmark"></i></button>
        <div style="width:50px;height:50px;border-radius:50%;background:rgba(192,57,43,0.1);color:var(--danger);display:flex;align-items:center;justify-content:center;font-size:24px;margin:0 auto 16px auto;">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        <h3 style="margin-bottom:10px;font-size:18px;color:var(--danger);font-weight:700;">Account Warning from Admin</h3>
        <p style="font-size:13px;color:var(--text-muted);margin-bottom:20px;">
            Warnings Count: <span id="studentWarningCount" style="font-weight:bold;color:var(--text);">0</span>
        </p>
        <div style="background:var(--bg);border:1px solid var(--border);border-radius:10px;padding:16px;margin-bottom:24px;text-align:left;font-size:13px;line-height:1.6;color:var(--text);white-space:pre-line;word-break:break-word;" id="studentWarningMessageBody">
            No warning message text.
        </div>
        <div>
            <button class="btn btn-primary" style="background:var(--danger);border-color:var(--danger);width:100%;" onclick="closeStudentWarningModal()">I Understand & Close</button>
        </div>
    </div>
</div>

<!-- ADMIN WARN MODAL -->
<div id="adminWarnModalOverlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:1100;align-items:center;justify-content:center;">
    <div style="background:var(--surface);border-radius:var(--radius);padding:28px;width:400px;max-width:90vw;position:relative;">
        <button class="icon-btn" style="position:absolute;top:16px;right:16px;" onclick="closeAdminWarnModal()"><i class="fa-solid fa-xmark"></i></button>
        <h3 style="margin-bottom:18px;font-size:16px;color:var(--primary);">Send Account Warning</h3>
        
        <input type="hidden" id="warnReportId">
        
        <div class="form-group">
            <label>Warning Message *</label>
            <textarea id="adminWarningMsgText" placeholder="Explain the violation and request correction..." style="width:100%;height:100px;padding:10px;border:1px solid var(--border);border-radius:10px;font-size:12px;background:var(--bg);color:var(--text);resize:none;box-sizing:border-box;"></textarea>
        </div>
        
        <div style="display:flex;gap:10px;margin-top:16px;">
            <button class="btn btn-primary" onclick="submitAdminWarning()">Send Warning</button>
            <button class="btn btn-outline" onclick="closeAdminWarnModal()">Cancel</button>
        </div>
    </div>
</div>
