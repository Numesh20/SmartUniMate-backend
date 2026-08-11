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

<!-- NOTIFICATION PANEL -->
@include('partials.notifications')

<!-- HEADER -->
@include('partials.header')

<div class="app-shell">
<!-- SIDEBAR -->
@include('partials.sidebar')

<!-- MAIN -->
<main>

<!-- HOME -->
@include('sections.home')

<!-- AI CHAT -->
@include('sections.chatbot')

<!-- CAMPUS NEWS -->
@include('sections.news')

<!-- KNOWLEDGE BASE -->
@include('sections.kb')

<!-- ACADEMIC -->
@include('sections.academic')

<!-- TIMETABLE -->
@include('sections.timetable')

<!-- GPA CALCULATOR -->
@include('sections.gpa')

<!-- COMMUNITY -->
@include('sections.community')

<!-- ADMIN -->
@include('sections.admin')

<!-- PROFILE -->
@include('sections.profile')

</main>
</div>

<!-- MODALS -->
@include('partials.modals')
@include('partials.scripts')
</body>
</html>
