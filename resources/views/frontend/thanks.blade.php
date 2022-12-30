{{--<h1>Thanks for your purchase! Come back soon.</h1>--}}
{{--<a href="/">Back to website</a>--}}

<style>
    /* Set height to 100% for body and html to enable the background image to cover the whole page: */

    .bgimg {
        /* Background image */
        background-image: url('https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');
        /* Full-screen */
        height: 100%;
        /* Center the background image */
        background-position: center;
        /* Scale and zoom in the image */
        background-size: cover;
        /* Add position: relative to enable absolutely positioned elements inside the image (place text) */
        position: relative;
        /* Add a white text color to all elements inside the .bgimg container */
        color: white;
        /* Add a font */
        font-family: "Courier New", Courier, monospace;
        /* Set the font-size to 25 pixels */
        font-size: 25px;
    }

    /* Position text in the top-left corner */
    .topleft {
        position: absolute;
        top: 0;
        left: 16px;
    }

    /* Position text in the bottom-left corner */
    .bottomleft {
        position: absolute;
        bottom: 0;
        left: 16px;
    }

    /* Position text in the middle */
    .middle {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    /* Style the <hr> element */
    hr {
        margin: auto;
        width: 40%;
    }
</style>

<div class="bgimg">
    <div class="topleft">
        <p></p>
    </div>
    <div class="middle">
        <h1>Thanks for your purchase! Come back soon.</h1>
        <hr>
    </div>
    <div class="bottomleft">
        <p><a style="color: #ffffff" href="/">Back</a></p>
    </div>
</div>
