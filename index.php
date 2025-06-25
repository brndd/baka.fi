<?php
$cirnoTheme = [
    'background_color' => 'black',
    'background_image' => "url('bg1.png'), url('bg2.png'), url('bg3.png')",
    'video_src' => 'cirno.webm'
];

$mikuTheme = [
    'background_color' => '#86cecb',
    'background_image' => "url('leek1.webp'), url('leek2.webp'), url('leek3.webp')",
    'video_src' => 'miku.webm'
];

$theme = $cirnoTheme;

$currentMonth = (int)date('n');
$currentDay = (int)date('j');

if (isset($_GET['miku'])) {
    $theme = $mikuTheme;
} elseif (isset($_GET['cirno'])) {
    $theme = $cirnoTheme;
} else {
    if ($currentMonth === 8 && $currentDay === 31) {
        $theme = $mikuTheme;
    } elseif ($currentMonth === 9 && $currentDay === 9) {
        $theme = $cirnoTheme;
    } /* else {
        if (mt_rand(0, 1) === 0) {
            $theme = $mikuTheme;
        } else {
            $theme = $cirnoTheme;
        }
    } */
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="icon" href="9icon.png" type="image/png" sizes="64x64">
<title>Baka.fi</title>

<style>
body {
    background-color: <?php echo $theme['background_color']; ?>;
    background-image: <?php echo $theme['background_image']; ?>;
    animation: ninefall 2s linear infinite;
    padding:0;
    margin:0;
}

h1 {color:white;font-family:sans-serif;font-size:48pt;text-align:center;}

@keyframes ninefall {
    0% {background-position: 0px 0px, 0px 0px, 0px 0px;}
    100% {background-position: 500px 500px, -400px 400px, 300px 300px;}
}

#video {
    position:absolute;
    top:50%;
    left:50%;
    margin:-240px 0 0 -240px;
    width:480px;
    height:480px;
}

#embed {
    width:480px;
    height:360px;
    margin:0;
    padding:0;
    z-index:2;
}

.baka {
    font: 36pt Sans-Serif;
    font-weight: bold;
    color: white;
    padding: 0;
    margin: 0;
    z-index:3;
}

/*animated marquees*/

.top {
    width: 100%;
    height:60px;
    white-space: nowrap;
    overflow: hidden;
    margin-bottom:0;
    padding:0;
}

.top span {
    display: inline-block;
    text-indent: 0;
    animation: top 3s linear infinite;
}

@keyframes top {
    0% {transform:translate(0,0);}
    100% {transform:translate(-50%,0);}
}

.bot {
    width:100%;
    height:60px;
    white-space: nowrap;
    overflow: hidden;
    margin:0;
    padding:0;
}

.bot span {
    display: inline-block;
    text-indent: 0;
    animation: bot 3s linear infinite;
    position:relative;
    right:40em;
}

@keyframes bot {
    0% {transform:translate(0,0);}
    100% {transform:translate(50%,0);}
}

</style>
</head>

<body>

<div id="video">
<p class="baka top"><span>BAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKA</span></p>
<video id="mainVideo" autoplay loop controls poster="<?php echo $theme['video_src']; ?>.webp">
    <source src="<?php echo $theme['video_src']; ?>" type="video/webm">
    Your BAKA browser doesn't support video, you BAKA.
</video>
<p class="baka bot"><span>BAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKABAKA</span></p>
</div>

</body>

</html>
