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