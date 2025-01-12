<?php

namespace Responsive_Addons_For_Elementor\WidgetsManager\Widgets\ThemeBuilder;

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

abstract class Woo_Products_Base extends Woo_Widget_Base {
	protected function register_controls() {

		$this->start_controls_section(
			'rael_section_products_style',
			[
				'label' => esc_html__( 'Products', 'responsive-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'rael_wc_style_warning',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'The style of this widget is often affected by your theme and plugins. If you experience any such issue, try to switch to a basic theme and deactivate related plugins.', 'responsive-addons-for-elementor' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
			]
		);

		$this->add_control(
			'rael_products_class',
			[
				'type' => Controls_Manager::HIDDEN,
				'default' => 'wc-products',
				'prefix_class' => 'rael-elementor-products-grid elementor-',
			]
		);

		$this->add_responsive_control(
			'rael_column_gap',
			[
				'label' => esc_html__( 'Columns Gap', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
				],
				'tablet_default' => [
					'size' => 20,
				],
				'mobile_default' => [
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products  ul.products' => 'grid-column-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'rael_row_gap',
			[
				'label' => esc_html__( 'Rows Gap', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 40,
				],
				'tablet_default' => [
					'size' => 40,
				],
				'mobile_default' => [
					'size' => 40,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products  ul.products' => 'grid-row-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'rael_align',
			[
				'label' => esc_html__( 'Alignment', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'responsive-addons-for-elementor' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'responsive-addons-for-elementor' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'responsive-addons-for-elementor' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'prefix_class' => 'elementor-product-loop-item--align-',
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rael_heading_image_style',
			[
				'label' => esc_html__( 'Image', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'rael_image_border',
				'selector' => '{{WRAPPER}}.elementor-wc-products .attachment-woocommerce_thumbnail',
			]
		);

		$this->add_responsive_control(
			'rael_image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products .attachment-woocommerce_thumbnail' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'rael_image_spacing',
			[
				'label' => esc_html__( 'Spacing', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products .attachment-woocommerce_thumbnail' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'rael_heading_title_style',
			[
				'label' => esc_html__( 'Title', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'rael_title_color',
			[
				'label' => esc_html__( 'Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .woocommerce-loop-product__title' => 'color: {{VALUE}}',
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .woocommerce-loop-category__title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'rael_title_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}}.elementor-wc-products ul.products li.product .woocommerce-loop-product__title, ' .
								'{{WRAPPER}}.elementor-wc-products ul.products li.product .woocommerce-loop-category__title',

			]
		);

		$this->add_responsive_control(
			'rael_title_spacing',
			[
				'label' => esc_html__( 'Spacing', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'em' => [
						'min' => 0,
						'max' => 5,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .woocommerce-loop-product__title' => 'margin-bottom: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .woocommerce-loop-category__title' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'rael_heading_rating_style',
			[
				'label' => esc_html__( 'Rating', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'rael_star_color',
			[
				'label' => esc_html__( 'Star Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .star-rating' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rael_empty_star_color',
			[
				'label' => esc_html__( 'Empty Star Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .star-rating::before' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rael_star_size',
			[
				'label' => esc_html__( 'Star Size', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'em',
				],
				'range' => [
					'em' => [
						'min' => 0,
						'max' => 4,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .star-rating' => 'font-size: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'rael_rating_spacing',
			[
				'label' => esc_html__( 'Spacing', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'em' => [
						'min' => 0,
						'max' => 5,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .star-rating' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'rael_heading_price_style',
			[
				'label' => esc_html__( 'Price', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'rael_price_color',
			[
				'label' => esc_html__( 'Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .price' => 'color: {{VALUE}}',
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .price ins' => 'color: {{VALUE}}',
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .price ins .amount' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'rael_price_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}}.elementor-wc-products ul.products li.product .price',
			]
		);

		$this->add_control(
			'rael_heading_old_price_style',
			[
				'label' => esc_html__( 'Regular Price', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'rael_old_price_color',
			[
				'label' => esc_html__( 'Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'global' => [
					'default' => Global_Colors::COLOR_PRIMARY,
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .price del' => 'color: {{VALUE}}',
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .price del .amount' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'rael_old_price_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_PRIMARY,
				],
				'selector' => '{{WRAPPER}}.elementor-wc-products ul.products li.product .price del .amount  ',
				'selector' => '{{WRAPPER}}.elementor-wc-products ul.products li.product .price del ',
			]
		);

		$this->add_control(
			'rael_heading_button_style',
			[
				'label' => esc_html__( 'Button', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs( 'rael_tabs_button_style' );

		$this->start_controls_tab(
			'rael_tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'responsive-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'rael_button_text_color',
			[
				'label' => esc_html__( 'Text Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rael_button_background_color',
			[
				'label' => esc_html__( 'Background Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rael_button_border_color',
			[
				'label' => esc_html__( 'Border Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .button' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'rael_button_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				],
				'selector' => '{{WRAPPER}}.elementor-wc-products ul.products li.product .button',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'rael_tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'responsive-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'rael_button_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .button:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rael_button_hover_background_color',
			[
				'label' => esc_html__( 'Background Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .button:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'rael_button_hover_border_color',
			[
				'label' => esc_html__( 'Border Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .button:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(), [
				'name' => 'rael_button_border',
				'exclude' => [ 'color' ],
				'selector' => '{{WRAPPER}}.elementor-wc-products ul.products li.product .button',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'rael_button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'rael_button_text_padding',
			[
				'label' => esc_html__( 'Text Padding', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'rael_button_spacing',
			[
				'label' => esc_html__( 'Spacing', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product .button' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'rael_automatically_align_buttons',
			[
				'label' => __( 'Automatically align buttons', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'responsive-addons-for-elementor' ),
				'label_off' => __( 'No', 'responsive-addons-for-elementor' ),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product' => '--button-align-display: flex; --button-align-direction: column; --button-align-justify: space-between;',
				],
				'render_type' => 'template',
			]
		);

		$this->add_control(
			'rael_heading_view_cart_style',
			[
				'label' => esc_html__( 'View Cart', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'rael_view_cart_color',
			[
				'label' => esc_html__( 'Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products .added_to_cart' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'rael_view_cart_typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_ACCENT,
				],
				'selector' => '{{WRAPPER}}.elementor-wc-products .added_to_cart',
			]
		);

		$this->add_responsive_control(
			'rael_view_cart_spacing',
			[
				'label' => esc_html__( 'Spacing', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
					'em' => [
						'min' => 0,
						'max' => 3.5,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products .added_to_cart' => 'margin-inline-start: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'rael_section_design_box',
			[
				'label' => esc_html__( 'Box', 'responsive-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'rael_box_border_width',
			[
				'label' => esc_html__( 'Border Width', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product' => 'border-style: solid; border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'rael_box_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'rael_box_padding',
			[
				'label' => esc_html__( 'Padding', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->start_controls_tabs( 'rael_box_style_tabs' );

		$this->start_controls_tab( 'rael_classic_style_normal',
			[
				'label' => esc_html__( 'Normal', 'responsive-addons-for-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'rael_box_shadow',
				'selector' => '{{WRAPPER}}.elementor-wc-products ul.products li.product',
			]
		);

		$this->add_control(
			'rael_box_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rael_box_border_color',
			[
				'label' => esc_html__( 'Border Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'rael_classic_style_hover',
			[
				'label' => esc_html__( 'Hover', 'responsive-addons-for-elementor' ),
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'rael_box_shadow_hover',
				'selector' => '{{WRAPPER}}.elementor-wc-products ul.products li.product:hover',
			]
		);

		$this->add_control(
			'rael_box_bg_color_hover',
			[
				'label' => esc_html__( 'Background Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rael_box_border_color_hover',
			[
				'label' => esc_html__( 'Border Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'rael_section_pagination_style',
			[
				'label' => esc_html__( 'Pagination', 'responsive-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'paginate' => 'yes',
				],
			]
		);

		$this->add_control(
			'rael_pagination_spacing',
			[
				'label' => esc_html__( 'Spacing', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} nav.woocommerce-pagination' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'rael_show_pagination_border',
			[
				'label' => esc_html__( 'Border', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Hide', 'responsive-addons-for-elementor' ),
				'label_on' => esc_html__( 'Show', 'responsive-addons-for-elementor' ),
				'default' => 'yes',
				'return_value' => 'yes',
				'prefix_class' => 'elementor-show-pagination-border-',
			]
		);

		$this->add_control(
			'rael_pagination_border_color',
			[
				'label' => esc_html__( 'Border Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} nav.woocommerce-pagination ul' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} nav.woocommerce-pagination ul li' => 'border-right-color: {{VALUE}}; border-left-color: {{VALUE}}',
				],
				'condition' => [
					'rael_show_pagination_border' => 'yes',
				],
			]
		);

		$this->add_control(
			'rael_pagination_padding',
			[
				'label' => esc_html__( 'Padding', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'em' => [
						'min' => 0,
						'max' => 2,
						'step' => 0.1,
					],
				],
				'size_units' => [ 'em' ],
				'selectors' => [
					'{{WRAPPER}} nav.woocommerce-pagination ul li a, {{WRAPPER}} nav.woocommerce-pagination ul li span' => 'padding: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'rael_pagination_typography',
				'selector' => '{{WRAPPER}} nav.woocommerce-pagination',
			]
		);

		$this->start_controls_tabs( 'rael_pagination_style_tabs' );

		$this->start_controls_tab( 'rael_pagination_style_normal',
			[
				'label' => esc_html__( 'Normal', 'responsive-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'rael_pagination_link_color',
			[
				'label' => esc_html__( 'Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} nav.woocommerce-pagination ul li a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rael_pagination_link_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} nav.woocommerce-pagination ul li a' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'rael_pagination_style_hover',
			[
				'label' => esc_html__( 'Hover', 'responsive-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'rael_pagination_link_color_hover',
			[
				'label' => esc_html__( 'Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} nav.woocommerce-pagination ul li a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rael_pagination_link_bg_color_hover',
			[
				'label' => esc_html__( 'Background Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} nav.woocommerce-pagination ul li a:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'rael_pagination_style_active',
			[
				'label' => esc_html__( 'Active', 'responsive-addons-for-elementor' ),
			]
		);

		$this->add_control(
			'rael_pagination_link_color_active',
			[
				'label' => esc_html__( 'Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} nav.woocommerce-pagination ul li span.current' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'rael_pagination_link_bg_color_active',
			[
				'label' => esc_html__( 'Background Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} nav.woocommerce-pagination ul li span.current' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'rael_sale_flash_style',
			[
				'label' => esc_html__( 'Sale Flash', 'responsive-addons-for-elementor' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'rael_show_onsale_flash',
			[
				'label' => esc_html__( 'Sale Flash', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => esc_html__( 'Hide', 'responsive-addons-for-elementor' ),
				'label_on' => esc_html__( 'Show', 'responsive-addons-for-elementor' ),
				'separator' => 'before',
				'default' => 'yes',
				'return_value' => 'yes',
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product span.onsale' => 'display: block',
				],
			]
		);

		$this->add_control(
			'rael_onsale_text_color',
			[
				'label' => esc_html__( 'Text Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product span.onsale' => 'color: {{VALUE}}',
				],
				'condition' => [
					'rael_show_onsale_flash' => 'yes',
				],
			]
		);

		$this->add_control(
			'rael_onsale_text_background_color',
			[
				'label' => esc_html__( 'Background Color', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product span.onsale' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'rael_show_onsale_flash' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'rael_onsale_typography',
				'selector' => '{{WRAPPER}}.elementor-wc-products ul.products li.product span.onsale',
				'condition' => [
					'rael_show_onsale_flash' => 'yes',
				],
			]
		);

		$this->add_control(
			'rael_onsale_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product span.onsale' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'rael_show_onsale_flash' => 'yes',
				],
			]
		);

		$this->add_control(
			'rael_onsale_width',
			[
				'label' => esc_html__( 'Width', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product span.onsale' => 'min-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rael_show_onsale_flash' => 'yes',
				],
			]
		);

		$this->add_control(
			'rael_onsale_height',
			[
				'label' => esc_html__( 'Height', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product span.onsale' => 'min-height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rael_show_onsale_flash' => 'yes',
				],
			]
		);

		$this->add_control(
			'rael_onsale_horizontal_position',
			[
				'label' => esc_html__( 'Position', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'responsive-addons-for-elementor' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'responsive-addons-for-elementor' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product span.onsale' => '{{VALUE}}',
				],
				'selectors_dictionary' => [
					'left' => 'right: auto; left: 0',
					'right' => 'left: auto; right: 0',
				],
				'condition' => [
					'rael_show_onsale_flash' => 'yes',
				],
			]
		);

		$this->add_control(
			'rael_onsale_distance',
			[
				'label' => esc_html__( 'Distance', 'responsive-addons-for-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'min' => -20,
						'max' => 20,
					],
					'em' => [
						'min' => -2,
						'max' => 2,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products ul.products li.product span.onsale' => 'margin: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'rael_show_onsale_flash' => 'yes',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Add To Cart Wrapper
	 *
	 * Add a div wrapper around the Add to Cart & View Cart buttons on the product cards inside the product grid.
	 * The wrapper is used to vertically align the Add to Cart Button and the View Cart link to the bottom of the card.
	 * This wrapper is added when the 'Automatically align buttons' toggle is selected.
	 * Using the 'woocommerce_loop_add_to_cart_link' hook.
	 *
	 * @since 1.8.0
	 *
	 * @param string $string
	 * @return string $string
	 */
	public function add_to_cart_wrapper( $string ) {
		return '<div class="woocommerce-loop-product__buttons">' . $string . '</div>';
	}

}
