<style>
    #cont-loader {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1000000;
        background-color: black;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .box {
        position: relative;
        width: 150px;
        height: 150px;
        transform-style: preserve-3d;
        margin: 0 auto;
        /* animation: rotateme 5s ease-in-out 0 infinite; */
        transform: rotateX(0deg);
        animation: rotateme 10s ease-in-out 0s infinite;
    }

    .box>div {
        position: absolute;
        height: 150px;
        width: 150px;
        background-color: rgba(88, 214, 246, 0.726);
        /* border: 2px solid black; */

    }

    @keyframes rotateme {
        50% {
            transform: rotateX(360deg) rotateY(360deg);
        }

        /* 100% {
        transform: rotateY(360deg);
    } */
    }

    .front {

        transform: translateZ(85px);

    }

    .back {

        transform: translateZ(-85px);

    }

    .top {
        top: -85px;
        transform: translateY(-150px);
        transform: rotateX(90deg);
    }

    .bottom {
        top: 85px;
        transform: translateY(150px);
        transform: rotateX(90deg);
    }

    .right {
        right: 85px;
        transform: translateX(-150px);
        transform: rotateY(90deg);

    }

    .left {
        right: -85px;
        transform: translateX(150px);
        transform: rotateY(90deg);
    }
</style>
<div id="cont-loader">
    <div class="box">
        <div class="front"></div>
        <div class="back"></div>
        <div class="top"></div>
        <div class="bottom"></div>
        <div class="left"></div>
        <div class="right"></div>
    </div>
</div>
<script>
    function myFunction() {
        myVar = setTimeout(showPage, 3000);
    }
    function showPage() {
        document.getElementById("cont-loader").style.display = "none";
        document.getElementsByTagName('body')[0].style.overflow = 'visible';
    }
</script>