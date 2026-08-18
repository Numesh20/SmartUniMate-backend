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
            <div style="margin:12px 0 4px 0;display:flex;align-items:flex-start;gap:10px;">
                <input type="checkbox" id="regTermsCheck" style="margin-top:3px;accent-color:var(--primary);width:15px;height:15px;flex-shrink:0;cursor:pointer;">
                <label for="regTermsCheck" style="font-size:12px;color:var(--text-muted);line-height:1.5;cursor:pointer;">
                    I have read and agree to the
                    <a href="#" style="color:var(--primary);text-decoration:none;font-weight:600;" onclick="openTermsModal('privacy');return false;">Privacy Policy</a>
                    and
                    <a href="#" style="color:var(--primary);text-decoration:none;font-weight:600;" onclick="openTermsModal('terms');return false;">Terms &amp; Conditions</a>.
                </label>
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

<!-- TERMS & PRIVACY POLICY MODAL -->
<div id="termsModalOverlay" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.6);z-index:1300;align-items:center;justify-content:center;backdrop-filter:blur(4px);" onclick="closeTermsModal(event)">
    <div style="background:var(--surface);border-radius:var(--radius);width:660px;max-width:95vw;max-height:90vh;display:flex;flex-direction:column;position:relative;box-shadow:0 20px 60px rgba(0,0,0,0.25);" onclick="event.stopPropagation()">
        <!-- Modal Header -->
        <div style="padding:24px 28px 0 28px;border-bottom:1px solid var(--border);">
            <button class="icon-btn" style="position:absolute;top:16px;right:16px;" onclick="closeTermsModalBtn()"><i class="fa-solid fa-xmark"></i></button>
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:18px;">
                <div style="width:40px;height:40px;border-radius:10px;background:linear-gradient(135deg,var(--primary),var(--primary-light));display:flex;align-items:center;justify-content:center;color:#fff;font-size:18px;">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div>
                    <h2 style="font-size:18px;font-family:'Playfair Display',serif;color:var(--primary);margin:0;">Legal & Privacy</h2>
                    <p style="font-size:12px;color:var(--text-muted);margin:2px 0 0 0;">SmartUniMate — Sabaragamuwa University of Sri Lanka</p>
                </div>
            </div>
            <!-- Tab switcher -->
            <div style="display:flex;gap:0;border-bottom:2px solid var(--border);margin-bottom:0;">
                <button id="termsTabPrivacy" onclick="switchTermsTab('privacy')" style="padding:10px 20px;font-size:13px;font-weight:600;border:none;background:none;cursor:pointer;border-bottom:2px solid var(--primary);color:var(--primary);margin-bottom:-2px;">Privacy Policy</button>
                <button id="termsTabTerms" onclick="switchTermsTab('terms')" style="padding:10px 20px;font-size:13px;font-weight:600;border:none;background:none;cursor:pointer;border-bottom:2px solid transparent;color:var(--text-muted);margin-bottom:-2px;">Terms & Conditions</button>
            </div>
        </div>
        <!-- Scrollable content -->
        <div style="overflow-y:auto;flex:1;padding:24px 28px;" id="termsScrollBody">

            <!-- PRIVACY POLICY PANEL -->
            <div id="termsPanelPrivacy">
                <p style="font-size:12px;color:var(--text-muted);margin-bottom:20px;">Last updated: August 2025 &nbsp;·&nbsp; Effective immediately upon registration.</p>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">1. Data We Collect</h3>
                <p style="font-size:13px;line-height:1.7;color:var(--text);margin-bottom:16px;">When you register or use SmartUniMate, we collect the following personal information:</p>
                <ul style="font-size:13px;line-height:1.9;color:var(--text);padding-left:20px;margin-bottom:16px;">
                    <li><strong>Identity data:</strong> Full name, student index number (ID).</li>
                    <li><strong>Contact data:</strong> University email address, phone number.</li>
                    <li><strong>Academic data:</strong> Faculty/department, year of study, timetable entries, GPA module records.</li>
                    <li><strong>Usage data:</strong> Community posts you create, comments, AI chatbot conversation history.</li>
                    <li><strong>Technical data:</strong> Browser type, device type, and session tokens stored locally in your browser.</li>
                </ul>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">2. How We Use Your Data</h3>
                <ul style="font-size:13px;line-height:1.9;color:var(--text);padding-left:20px;margin-bottom:16px;">
                    <li>To provide personalised academic assistance through the AI chatbot and platform features.</li>
                    <li>To allow you to participate in the student community (posts, comments).</li>
                    <li>To enable administrators to manage student accounts and maintain platform integrity.</li>
                    <li>To send in-app notifications about your account status or warnings.</li>
                </ul>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">3. Data Sharing & Third Parties</h3>
                <p style="font-size:13px;line-height:1.7;color:var(--text);margin-bottom:16px;">We do <strong>not</strong> sell, rent, or trade your personal data to third parties. Your data may be processed by our hosting infrastructure provider solely to operate this platform. No marketing or advertising data sharing occurs.</p>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">4. Data Retention</h3>
                <p style="font-size:13px;line-height:1.7;color:var(--text);margin-bottom:16px;">Your account and associated data are retained for the duration of your enrollment at SUSL. Upon graduation or withdrawal, data may be retained for a period of up to 12 months for administrative purposes, after which it will be securely deleted.</p>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">5. Your Rights</h3>
                <ul style="font-size:13px;line-height:1.9;color:var(--text);padding-left:20px;margin-bottom:16px;">
                    <li><strong>Access:</strong> You can view all personal data stored in your profile at any time.</li>
                    <li><strong>Correction:</strong> You can update your name, phone, and faculty via Profile → Edit.</li>
                    <li><strong>Deletion:</strong> To request full account deletion, contact your university system administrator.</li>
                    <li><strong>Data portability:</strong> You may request a copy of your data by contacting the platform administrator.</li>
                </ul>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">6. Cookies & Local Storage</h3>
                <p style="font-size:13px;line-height:1.7;color:var(--text);margin-bottom:16px;">SmartUniMate uses browser <strong>localStorage</strong> to store your authentication token, user preferences (theme, language), and timetable data locally on your device. No persistent tracking cookies are placed on your device. Clearing your browser storage will log you out.</p>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">7. Security</h3>
                <p style="font-size:13px;line-height:1.7;color:var(--text);margin-bottom:8px;">We implement industry-standard security measures including password hashing (bcrypt), bearer token authentication, and CSRF protection. However, no system is 100% secure; please use a strong, unique password and keep it confidential.</p>
            </div>

            <!-- TERMS & CONDITIONS PANEL -->
            <div id="termsPanelTerms" style="display:none;">
                <p style="font-size:12px;color:var(--text-muted);margin-bottom:20px;">Last updated: August 2025 &nbsp;·&nbsp; By registering you agree to these terms.</p>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">1. Eligibility</h3>
                <p style="font-size:13px;line-height:1.7;color:var(--text);margin-bottom:16px;">SmartUniMate is exclusively available to currently enrolled students and authorised staff of Sabaragamuwa University of Sri Lanka (SUSL). By registering, you confirm that you are an eligible member of the SUSL community.</p>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">2. Acceptable Use — Community Forum</h3>
                <p style="font-size:13px;line-height:1.7;color:var(--text);margin-bottom:8px;">When posting in the Community section, you agree to:</p>
                <ul style="font-size:13px;line-height:1.9;color:var(--text);padding-left:20px;margin-bottom:16px;">
                    <li>Post only content that is respectful, relevant, and truthful.</li>
                    <li>Not post spam, advertisements, or repetitive/off-topic content.</li>
                    <li>Not harass, bully, threaten, or discriminate against any other user.</li>
                    <li>Not share personal contact details of other students without consent.</li>
                    <li>Not post false academic information that may mislead other students.</li>
                    <li>Not impersonate university staff, lecturers, or other students.</li>
                </ul>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">3. AI Chatbot Disclaimer</h3>
                <p style="font-size:13px;line-height:1.7;color:var(--text);margin-bottom:16px;">The SmartUniMate AI assistant is provided for <strong>informational and academic guidance purposes only</strong>. Responses generated by the AI are <strong>not official university advice</strong>. For official academic decisions (e.g., results, deadlines, appeals), always consult the relevant faculty or registrar's office directly.</p>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">4. Account Responsibility</h3>
                <ul style="font-size:13px;line-height:1.9;color:var(--text);padding-left:20px;margin-bottom:16px;">
                    <li>You are responsible for all activity under your account.</li>
                    <li>You must not share your login credentials with anyone.</li>
                    <li>You must notify the administrator immediately if you suspect unauthorised use of your account.</li>
                    <li>Keep your profile information accurate and up to date.</li>
                </ul>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">5. Enforcement & Suspension</h3>
                <p style="font-size:13px;line-height:1.7;color:var(--text);margin-bottom:16px;">Violations of these Terms may result in account warnings, temporary suspension, or permanent removal from the platform. Administrators reserve the right to remove any content that violates these Terms without prior notice. Serious violations may be reported to the university disciplinary committee.</p>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">6. Intellectual Property</h3>
                <p style="font-size:13px;line-height:1.7;color:var(--text);margin-bottom:16px;">Content you post remains your intellectual property. By posting, you grant SmartUniMate a non-exclusive, royalty-free licence to display your content within the platform for other registered students to see. You may delete your own posts at any time.</p>

                <h3 style="font-size:14px;font-weight:700;color:var(--primary);margin:0 0 8px 0;">7. Changes to Terms</h3>
                <p style="font-size:13px;line-height:1.7;color:var(--text);margin-bottom:8px;">We may update these Terms from time to time. Continued use of SmartUniMate after changes are posted constitutes your acceptance of the revised Terms. Significant changes will be communicated via in-app notifications.</p>
            </div>

        </div>
        <!-- Modal Footer -->
        <div style="padding:16px 28px;border-top:1px solid var(--border);display:flex;justify-content:flex-end;gap:10px;align-items:center;">
            <span style="font-size:12px;color:var(--text-muted);flex:1;">© 2025 SmartUniMate · Sabaragamuwa University of Sri Lanka</span>
            <button class="btn btn-primary" onclick="closeTermsModalBtn()">Close</button>
        </div>
    </div>
</div>
