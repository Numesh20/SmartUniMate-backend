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