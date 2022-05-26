<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<?php
while ( have_posts() ) :
	the_post();
	?>

<main id="content" <?php post_class( 'site-main' ); ?> role="main">

	<?php if ( apply_filters( 'hello_elementor_page_title', true ) ) : ?>
		<header class="page-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header>
	<?php endif; ?>






	<div class="page-content">
hej med dig

 <!-- <template>
      <article class="projekt_card">
        <div class="card_img"></div>
        <div class="card_text">
          <div>
            <h3 class="projekt_titel"></h3>
            <p class="kort_beskrivelse"></p>
          </div>
          <p class="trin"></p>
        </div>
     	</article>
    </template> -->

	

	<div id="filter_menu">
      <h3 class="filtrer_h3">Filtrer CV-skabelonerne</h3>
        <div id="filter">
          <button class="filter-btn selected" data-category="alle">Alle</button>
          <button class="filter-btn" data-category="simpel">Simpel</button>
		  <button class="filter-btn" data-category="farverig">Farverig</button>
		  <button class="filter-btn" data-category="formelt">Formelt</button>
		  <button class="filter-btn" data-category="kreativ">Kreativ</button>
        </div>
    </div>

	  <style>
		.page-content {
		background-color: #adbbad;}
	
	</style>

	<script>	
    	const url = "http://asgerjhb.dk/kea/02_SEM/kickstartdinkarriere/wordpress/wp-json/wp/v2/cv-skabelon?per_page=100";//wp-json
		
		let cv-skabeloner; //json databasen
      	let filter = "alle"; //variabel som ændrer sig alt efter hvilken filterknap du klikker på

		async function fetchData() {
        //kaldes når siden er loadet
        let response = await fetch(url);
        cv-skabeloner = await response.json();
        visCv-skabeloner();
      }

	  function visCv-skabeloner(){
		  console.log(cv-skabeloner);
		  cv-skabeloner.forEach(cv-skabelon =>{
			
			const klon = template.cloneNode(true).content
		  })
	  }

	</script>



















		<?php the_content(); ?>
		<div class="post-tags">
			<?php the_tags( '<span class="tag-links">' . __( 'Tagged ', 'hello-elementor' ), null, '</span>' ); ?>
		</div>
		<?php wp_link_pages(); ?>
	</div>

	<?php comments_template(); ?>
</main>

	<?php
endwhile;
