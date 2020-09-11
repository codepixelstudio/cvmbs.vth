
<!-- statistics -->
<div id="clinical_trial_statistics">

    <?php $statistics = get_field( 'clinical_trial_statistics', 'options' ); ?>

    <section class="fast-facts">

        <div class="fast-facts__inner">

        	<div class="fast-facts__grid">

    			<?php foreach ( $statistics as $statistic ) : ?>

                <?php

                    $value       = $statistic[ 'value' ];
                    $rate        = $statistic[ 'rate' ];
                    $description = $statistic[ 'description' ];
                    $source      = $statistic[ 'source' ];

                ?>

    			<div class="fast-fact">

    				<span class="fast-fact__value">

                        <?php echo $value; ?>

                    </span>

    				<span class="fast-fact__rate">

                        <?php echo $rate; ?>

                    </span>

    				<span class="fast-fact__desc">

                        <?php echo $description; ?>

                    </span>

    				<?php if ( $source  ) : ?>

    				<span class="fast-fact__source">

                        (<?php echo $source; ?>)

                    </span>

    				<?php endif; ?>

    			</div>

                <?php endforeach; ?>

    		</div><!-- .fast-facts__grid -->

    	</div><!-- .fast-facts__inner -->

    </section><!-- .fast-facts -->

</div>
<!-- END statistics -->
