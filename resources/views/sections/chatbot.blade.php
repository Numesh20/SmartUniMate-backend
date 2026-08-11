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