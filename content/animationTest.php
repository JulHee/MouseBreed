<style>

    #cage {
        height: 450px;
        width: 450px;
        background: url('/data/img/old_map.png');
        position: relative;
        border-radius: 10px;
        border: 5px solid #aaaaaa;
    }

    .mouse_container {
        position: absolute;
        drag
    }

    .mouse_img {
        width: 30px;
        height: 30px;
        background: url('/data/img/play/play_mouse.png') no-repeat center;
        margin-left: auto;
        margin-right: auto;
    }

    .mouse_container:hover {
        cursor: pointer;
    }

    .mouse_container p {
        display: block;
        margin-left: auto;
        margin-right: auto;
        font-weight: bold;
    }

    .stopped {
    }

</style>

<div id="cage"></div>

<p>Maus: <span id="clickedMouse"></span></p>
