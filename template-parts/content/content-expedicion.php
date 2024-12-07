<?php

/**
 * Template part for displaying single "Expedicion" custom posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package armch
 */

include_once(__DIR__ . '/../../inc/expedicion-functions.php');

$expedicion = armch_get_expedicion(get_the_ID());
?>

<article id="post-<?php the_ID(); ?>" <?php armch_content_class(); ?>>
	<header>
		<?php the_title('<h1 class="expedicion-title">', '</h1>'); ?>
	</header><!-- .expedicion-title -->

	<div class="expedicion-content grid grid-cols-1 md:grid-cols-3 gap-6">
		<div class="main-info md:col-span-2">
			<img src="<?php echo $expedicion['feat_img']; ?>" class="!mt-0" />

			<?php echo wp_kses_post($expedicion['descripcion']); ?>

			<h2>Itinerario</h2>
			<?php echo wp_kses_post($expedicion['itinerario']); ?>

			<h2>Observaciones generales</h2>
			<?php echo wp_kses_post($expedicion['observaciones']); ?>

			<h2>Recomendaciones</h2>
			<?php
			$recomendaciones = get_page_by_path('recomendaciones');

			echo $recomendaciones->post_content;
			?>
		</div><!-- .main-info -->

		<div class="plus-info prose-headings:m-0">
			<div id="info-misc" class="flex flex-col p-4 mb-6 bg-secondary text-primary gap-6 prose-headings:mb-1 prose-headings:pb-1 prose-headings:border-b prose-headings:border-b-slate-700 prose-headings:text-primary">
				<div>
					<h2>Costo</h2>
					<?php echo $expedicion['costos']; ?>
				</div>
				<div>
					<h2>Dificultad</h2>
					<?php echo $expedicion['dificultad']['label']; ?>
				</div>

				<div>
					<h2>Duración</h2>
					<?php echo wp_kses_post($expedicion['duracion']); ?>
				</div>

				<div>
					<h2>Temperaturas</h2>
					<?php echo wp_kses_post($expedicion['temperaturas']); ?>
				</div>

				<div>
					<h2>Alturas</h2>
					<?php echo wp_kses_post($expedicion['altura']); ?>
				</div>

				<div>
					<h2>Cupo de participantes</h2>
					<?php echo wp_kses_post($expedicion['cupo']); ?>
				</div>
			</div><!-- #info-misc -->

			<div id="info-equipos" class="bg-primary text-secondary prose-headings:text-secondary p-4">
				<h2>Equipamiento necesario</h2>
				<?php echo wp_kses_post($expedicion['equipamiento']); ?>

				<h2>Incluye</h2>
				<?php echo wp_kses_post($expedicion['items_incluidos']); ?>

				<h2>No incluye</h2>
				<?php echo wp_kses_post($expedicion['items_excluidos']); ?>
			</div>
		</div><!-- #info-equipos -->
	</div><!-- .expedicion-content -->
</article><!-- #post-${ID} -->

<!-- 
[0] => feat_img
[1] => descripcion
[2] => itinerario
[3] => items_incluidos
[4] => items_excluidos
[5] => equipamiento
[6] => recomendaciones
[7] => costos
[8] => dificultad
[9] => duracion
[10] => observaciones
[11] => temperaturas
[12] => altura
[13] => cupo
[14] => transporte
[15] => alimentacion -->