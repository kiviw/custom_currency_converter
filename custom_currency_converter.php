<?php
/**
 * Plugin Name: Custom Currency Converter
 * Plugin URI: Your plugin website URL
 * Description: A custom currency converter widget for converting between WLD and KSH.
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: Your website URL
 * Text Domain: custom-currency-converter
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

class Custom_Currency_Converter_Widget extends WP_Widget {

    // Widget class code as before

    public function form($instance) {
        // Widget settings form code
        // Add any custom settings for the widget here
    }

    public function update($new_instance, $old_instance) {
        // Update widget settings
    }
}

// Register the widget
function register_custom_currency_converter_widget() {
    register_widget('Custom_Currency_Converter_Widget');
}
add_action('widgets_init', 'register_custom_currency_converter_widget');

// Add shortcode to display the currency converter
function custom_currency_converter_shortcode() {
    ob_start();
    ?>
    <div class="custom-currency-converter">
        <label for="amount">Enter amount in WLD:</label>
        <input type="number" id="amount" min="0" step="1" onchange="convertCurrency()" />
        <p id="result"></p>
    </div>
    <script>
        function convertCurrency() {
            const exchangeRate = 210; // Fixed exchange rate (1 WLD = 210 KSH)
            const amountInWLD = parseFloat(document.getElementById('amount').value);
            const amountInKSH = amountInWLD * exchangeRate;
            document.getElementById('result').innerText = `${amountInWLD} WLD = ${amountInKSH.toFixed(2)} KSH`;
        }
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_currency_converter', 'custom_currency_converter_shortcode');
