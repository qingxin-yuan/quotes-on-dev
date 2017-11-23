<?php 
/**
 * The template for displaying the Submit a Quote page
 */





get_header();?>
<div id="primary" class="content-area">
  <main id="main" class="site-main">
    <section>
      <header>
        <?php the_title('<h1 class="entry-title">','</h1>')?>
      </header>
    </section>

    <div class="quote-submission-wrapper">
      <form name="quote-form" id="quote-submission-form">

       <div>
         <label for="quote-author">Author of Quote</label>
         <input type="text" name="quote_author" id="quote-author">
       </div>

       <div>
         <label for="quote-content">Quote</label>
         <textarea rows="3" cols="20" name="quote_content" id="quote-content"></textarea>
       </div>

       <div>
         <label for="quote-source">Where did you find this quote?</label>
         <input type="text" name="quote_source" id="quote-source">
       </div>

       <div>
         <label for="quote-source-url">Provide a url source of the quote</label>
         <input type="url" name="quote_source_url" id="quote-source-url">
       </div>

       <input type="submit" value="Submit Quote">

      </form>

        <p class="submit-success-message"></p>


    </div>

  </main>


</div>








<?php get_footer()?>