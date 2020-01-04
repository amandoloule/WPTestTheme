<?php
get_header();
?>
<style>
    section {
        width: 100%;
        float: left;
        padding: 100px 0;
    }
    img.test {
        max-width: 50%;
        height: auto;
        border: 3px solid #000;
        margin: 0 0 30px;
    }
</style>
<section class="main-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">Welcome to Jobbrs Wordpress Test!</h1>
                <h3>Tasks:</h3>
                <p>1. Create a child theme</p>
                <p>2. Register custom post type "news"</p>
                <p>3. Create "Blog page" (from PSD file) and display those "news" - 2 per page (3 pages minimum)</p>
                <label>Screenshot:</label><br/>
                <img class="test" src="<?php echo get_template_directory_uri(); ?>/dist/img/screen.jpg" alt="screen"/>
                <p>4. Use the latest Bootstrap CSS framework</p>
                <p>5. Pagination must work.</p>
                <p>6. Create sticky Menu in header and link "Blog page". You can choose the layout of the menu yourself.</p>
                <br/>
                <br/>
                <p>After you are done, please send all necessary files with README file on how to set it up in local.</p>
                <p><a href="mailto:studio@jobbrs.com">studio@jobbrs.com</a></p>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>