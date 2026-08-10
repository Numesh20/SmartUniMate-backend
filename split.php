<?php
\ = file_get_contents('resources/views/welcome.blade.php');

// Define extraction patterns and their replacement strings.
// Note: We use lazy quantifiers (.*?) to grab exactly what we need.

// 1. Styles
preg_match('/<style>.*?<\/style>/s', \, \);
file_put_contents('resources/views/partials/styles.blade.php', \[0]);
\ = str_replace(\[0], '@include(\'partials.styles\')', \);

// 2. Notifications
preg_match('/<!-- NOTIFICATION PANEL -->.*?<\/div>\s*<!-- HEADER -->/s', \, \);
// Remove the <!-- HEADER --> from the match so we don't accidentally remove it
\ = preg_replace('/<!-- HEADER -->\s*$/', '', \[0]);
file_put_contents('resources/views/partials/notifications.blade.php', trim(\));
\ = str_replace(trim(\), '@include(\'partials.notifications\')', \);

// 3. Header
preg_match('/<!-- HEADER -->\s*<header>.*?<\/header>/s', \, \);
file_put_contents('resources/views/partials/header.blade.php', \[0]);
\ = str_replace(\[0], '@include(\'partials.header\')', \);

// 4. Sidebar
preg_match('/<!-- SIDEBAR -->\s*<aside>.*?<\/aside>/s', \, \);
file_put_contents('resources/views/partials/sidebar.blade.php', \[0]);
\ = str_replace(\[0], '@include(\'partials.sidebar\')', \);

// 5. Sections
\ = [
    'home' => '/<!-- HOME -->.*?<!-- ADMIN HOME VIEW -->.*?<\/div>\s*<\/div>\s*<!-- NEWS -->/s', // Home has two views inside it, ends before NEWS
    'news' => '/<!-- NEWS -->.*?<\/div>\s*<!-- KB -->/s',
    'kb' => '/<!-- KB -->.*?<\/div>\s*<!-- AI CHATBOT -->/s',
    'chatbot' => '/<!-- AI CHATBOT -->.*?<\/div>\s*<!-- ACADEMIC SEARCH -->/s',
    'academic' => '/<!-- ACADEMIC SEARCH -->.*?<\/div>\s*<!-- TIMETABLE -->/s',
    'timetable' => '/<!-- TIMETABLE -->.*?<\/div>\s*<!-- GPA -->/s',
    'gpa' => '/<!-- GPA -->.*?<\/div>\s*<!-- COMMUNITY -->/s',
    'community' => '/<!-- COMMUNITY -->.*?<\/div>\s*<!-- PROFILE -->/s',
    'profile' => '/<!-- PROFILE -->.*?<\/div>\s*<!-- ADMIN PANEL -->/s',
    'admin' => '/<!-- ADMIN PANEL -->.*?<\/div>\s*<\/main>/s' // Ends before </main>
];

foreach (\ as \ => \) {
    if (preg_match(\, \, \)) {
        // We might capture the next section's comment due to the regex logic, so clean it up.
        \ = \[0];
        // Remove trailing comment of next section if present
        \ = preg_replace('/\s*<!-- [A-Z\s]+ -->\s*$/', '', \);
        if (\ === 'home') \ = preg_replace('/\s*<!-- NEWS -->\s*$/', '', \);
        if (\ === 'admin') \ = preg_replace('/\s*<\/main>\s*$/', '', \);
        
        file_put_contents("resources/views/sections/{\}.blade.php", trim(\));
        \ = str_replace(trim(\), "@include('sections.{\}')\n", \);
    }
}

// 6. Modals
// Modals start at <!-- MODALS --> and end before <!-- SCRIPTS -->
preg_match('/<!-- MODALS -->.*?<!-- SCRIPTS -->/s', \, \);
\ = preg_replace('/<!-- SCRIPTS -->\s*$/', '', \[0]);
file_put_contents('resources/views/partials/modals.blade.php', trim(\));
\ = str_replace(trim(\), '@include(\'partials.modals\')', \);

// 7. Scripts
preg_match('/<!-- SCRIPTS -->.*?<\/body>/s', \, \);
\ = preg_replace('/<\/body>\s*$/', '', \[0]);
file_put_contents('resources/views/partials/scripts.blade.php', trim(\));
\ = str_replace(trim(\), '@include(\'partials.scripts\')', \);

// Clean up redundant blank lines
\ = preg_replace('/^\h*\v+/m', "\n", \);

file_put_contents('resources/views/welcome_modular.blade.php', trim(\));
echo "Split complete.\n";
?>
