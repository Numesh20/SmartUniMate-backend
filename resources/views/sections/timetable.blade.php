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