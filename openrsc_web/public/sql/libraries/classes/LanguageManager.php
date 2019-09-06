<?php

/* vim: set expandtab sw=4 ts=4 sts=4: */
/**
 * Hold the PhpMyAdmin\LanguageManager class.
 */

namespace PhpMyAdmin;

use PhpMyAdmin\Url;
use PhpMyAdmin\Core;
use PhpMyAdmin\Util;
use PhpMyAdmin\Language;
use PhpMyAdmin\Template;

/**
 * Language selection manager.
 */
class LanguageManager
{
    /**
     * @var array Definition data for languages
     *
     * Each member contains:
     * - Language code
     * - English language name
     * - Native language name
     * - Match regullar expression
     * - MySQL locale
     */
    private static $_language_data = [
        'af' => [
            'af',
            'Afrikaans',
            '',
            'af|afrikaans',
            '',
        ],
        'ar' => [
            'ar',
            'Arabic',
            '&#1575;&#1604;&#1593;&#1585;&#1576;&#1610;&#1577;',
            'ar|arabic',
            'ar_AE',
        ],
        'az' => [
            'az',
            'Azerbaijani',
            'Az&#601;rbaycanca',
            'az|azerbaijani',
            '',
        ],
        'bn' => [
            'bn',
            'Bangla',
            'বাংলা',
            'bn|bangla',
            '',
        ],
        'be' => [
            'be',
            'Belarusian',
            '&#1041;&#1077;&#1083;&#1072;&#1088;&#1091;&#1089;&#1082;&#1072;&#1103;',
            'be|belarusian',
            'be_BY',
        ],
        'be@latin' => [
            'be@latin',
            'Belarusian (latin)',
            'Bie&#0322;aruskaja',
            'be[-_]lat|be@latin|belarusian latin',
            '',
        ],
        'bg' => [
            'bg',
            'Bulgarian',
            '&#1041;&#1098;&#1083;&#1075;&#1072;&#1088;&#1089;&#1082;&#1080;',
            'bg|bulgarian',
            'bg_BG',
        ],
        'bs' => [
            'bs',
            'Bosnian',
            'Bosanski',
            'bs|bosnian',
            '',
        ],
        'br' => [
            'br',
            'Breton',
            'Brezhoneg',
            'br|breton',
            '',
        ],
        'brx' => [
            'brx',
            'Bodo',
            'बड़ो',
            'brx|bodo',
            '',
        ],
        'ca' => [
            'ca',
            'Catalan',
            'Catal&agrave;',
            'ca|catalan',
            'ca_ES',
        ],
        'ckb' => [
            'ckb',
            'Sorani',
            'سۆرانی',
            'ckb|sorani',
            '',
        ],
        'cs' => [
            'cs',
            'Czech',
            'Čeština',
            'cs|czech',
            'cs_CZ',
        ],
        'cy' => [
            'cy',
            'Welsh',
            'Cymraeg',
            'cy|welsh',
            '',
        ],
        'da' => [
            'da',
            'Danish',
            'Dansk',
            'da|danish',
            'da_DK',
        ],
        'de' => [
            'de',
            'German',
            'Deutsch',
            'de|german',
            'de_DE',
        ],
        'el' => [
            'el',
            'Greek',
            '&Epsilon;&lambda;&lambda;&eta;&nu;&iota;&kappa;&#940;',
            'el|greek',
            '',
        ],
        'en' => [
            'en',
            'English',
            '',
            'en|english',
            'en_US',
        ],
        'en_gb' => [
            'en_GB',
            'English (United Kingdom)',
            '',
            'en[_-]gb|english (United Kingdom)',
            'en_GB',
        ],
        'eo' => [
            'eo',
            'Esperanto',
            'Esperanto',
            'eo|esperanto',
            '',
        ],
        'es' => [
            'es',
            'Spanish',
            'Espa&ntilde;ol',
            'es|spanish',
            'es_ES',
        ],
        'et' => [
            'et',
            'Estonian',
            'Eesti',
            'et|estonian',
            'et_EE',
        ],
        'eu' => [
            'eu',
            'Basque',
            'Euskara',
            'eu|basque',
            'eu_ES',
        ],
        'fa' => [
            'fa',
            'Persian',
            '&#1601;&#1575;&#1585;&#1587;&#1740;',
            'fa|persian',
            '',
        ],
        'fi' => [
            'fi',
            'Finnish',
            'Suomi',
            'fi|finnish',
            'fi_FI',
        ],
        'fil' => [
            'fil',
            'Filipino',
            'Pilipino',
            'fil|filipino',
            '',
        ],
        'fr' => [
            'fr',
            'French',
            'Fran&ccedil;ais',
            'fr|french',
            'fr_FR',
        ],
        'fy' => [
            'fy',
            'Frisian',
            'Frysk',
            'fy|frisian',
            '',
        ],
        'gl' => [
            'gl',
            'Galician',
            'Galego',
            'gl|galician',
            'gl_ES',
        ],
        'gu' => [
            'gu',
            'Gujarati',
            'ગુજરાતી',
            'gu|gujarati',
            'gu_IN',
        ],
        'he' => [
            'he',
            'Hebrew',
            '&#1506;&#1489;&#1512;&#1497;&#1514;',
            'he|hebrew',
            'he_IL',
        ],
        'hi' => [
            'hi',
            'Hindi',
            '&#2361;&#2367;&#2344;&#2381;&#2342;&#2368;',
            'hi|hindi',
            'hi_IN',
        ],
        'hr' => [
            'hr',
            'Croatian',
            'Hrvatski',
            'hr|croatian',
            'hr_HR',
        ],
        'hu' => [
            'hu',
            'Hungarian',
            'Magyar',
            'hu|hungarian',
            'hu_HU',
        ],
        'hy' => [
            'hy',
            'Armenian',
            'Հայերէն',
            'hy|armenian',
            '',
        ],
        'ia' => [
            'ia',
            'Interlingua',
            '',
            'ia|interlingua',
            '',
        ],
        'id' => [
            'id',
            'Indonesian',
            'Bahasa Indonesia',
            'id|indonesian',
            'id_ID',
        ],
        'ig' => [
            'ig',
            'Igbo',
            'Asụsụ Igbo',
            'ig|igbo',
            '',
        ],
        'it' => [
            'it',
            'Italian',
            'Italiano',
            'it|italian',
            'it_IT',
        ],
        'ja' => [
            'ja',
            'Japanese',
            '&#26085;&#26412;&#35486;',
            'ja|japanese',
            'ja_JP',
        ],
        'ko' => [
            'ko',
            'Korean',
            '&#54620;&#44397;&#50612;',
            'ko|korean',
            'ko_KR',
        ],
        'ka' => [
            'ka',
            'Georgian',
            '&#4325;&#4304;&#4320;&#4311;&#4323;&#4314;&#4312;',
            'ka|georgian',
            '',
        ],
        'kab' => [
            'kab',
            'Kabylian',
            'Taqbaylit',
            'kab|kabylian',
            '',
        ],
        'kk' => [
            'kk',
            'Kazakh',
            'Қазақ',
            'kk|kazakh',
            '',
        ],
        'km' => [
            'km',
            'Khmer',
            'ខ្មែរ',
            'km|khmer',
            '',
        ],
        'kn' => [
            'kn',
            'Kannada',
            'ಕನ್ನಡ',
            'kn|kannada',
            '',
        ],
        'ksh' => [
            'ksh',
            'Colognian',
            'Kölsch',
            'ksh|colognian',
            '',
        ],
        'ku' => [
            'ku',
            'Kurdish',
            'کوردی',
            'ku|kurdish',
            '',
        ],
        'ky' => [
            'ky',
            'Kyrgyz',
            'Кыргызча',
            'ky|kyrgyz',
            '',
        ],
        'li' => [
            'li',
            'Limburgish',
            'Lèmbörgs',
            'li|limburgish',
            '',
        ],
        'lt' => [
            'lt',
            'Lithuanian',
            'Lietuvi&#371;',
            'lt|lithuanian',
            'lt_LT',
        ],
        'lv' => [
            'lv',
            'Latvian',
            'Latvie&scaron;u',
            'lv|latvian',
            'lv_LV',
        ],
        'mk' => [
            'mk',
            'Macedonian',
            'Macedonian',
            'mk|macedonian',
            'mk_MK',
        ],
        'ml' => [
            'ml',
            'Malayalam',
            'Malayalam',
            'ml|malayalam',
            '',
        ],
        'mn' => [
            'mn',
            'Mongolian',
            '&#1052;&#1086;&#1085;&#1075;&#1086;&#1083;',
            'mn|mongolian',
            'mn_MN',
        ],
        'ms' => [
            'ms',
            'Malay',
            'Bahasa Melayu',
            'ms|malay',
            'ms_MY',
        ],
        'my' => [
            'my',
            'Burmese',
            'မြန်မာ',
            'my|burmese',
            '',
        ],
        'ne' => [
            'ne',
            'Nepali',
            'नेपाली',
            'ne|nepali',
            '',
        ],
        'nb' => [
            'nb',
            'Norwegian',
            'Norsk',
            'nb|norwegian',
            'nb_NO',
        ],
        'nn' => [
            'nn',
            'Norwegian Nynorsk',
            'Nynorsk',
            'nn|nynorsk',
            'nn_NO',
        ],
        'nl' => [
            'nl',
            'Dutch',
            'Nederlands',
            'nl|dutch',
            'nl_NL',
        ],
        'pa' => [
            'pa',
            'Punjabi',
            'ਪੰਜਾਬੀ',
            'pa|punjabi',
            '',
        ],
        'pl' => [
            'pl',
            'Polish',
            'Polski',
            'pl|polish',
            'pl_PL',
        ],
        'pt_br' => [
            'pt_BR',
            'Brazilian Portuguese',
            'Portugu&ecirc;s',
            'pt[-_]br|brazilian portuguese',
            'pt_BR',
        ],
        'pt' => [
            'pt',
            'Portuguese',
            'Portugu&ecirc;s',
            'pt|portuguese',
            'pt_PT',
        ],
        'ro' => [
            'ro',
            'Romanian',
            'Rom&acirc;n&#259;',
            'ro|romanian',
            'ro_RO',
        ],
        'ru' => [
            'ru',
            'Russian',
            '&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081;',
            'ru|russian',
            'ru_RU',
        ],
        'si' => [
            'si',
            'Sinhala',
            '&#3523;&#3538;&#3458;&#3524;&#3517;',
            'si|sinhala',
            '',
        ],
        'sk' => [
            'sk',
            'Slovak',
            'Sloven&#269;ina',
            'sk|slovak',
            'sk_SK',
        ],
        'sl' => [
            'sl',
            'Slovenian',
            'Sloven&scaron;&#269;ina',
            'sl|slovenian',
            'sl_SI',
        ],
        'sq' => [
            'sq',
            'Albanian',
            'Shqip',
            'sq|albanian',
            'sq_AL',
        ],
        'sr@latin' => [
            'sr@latin',
            'Serbian (latin)',
            'Srpski',
            'sr[-_]lat|sr@latin|serbian latin',
            'sr_YU',
        ],
        'sr' => [
            'sr',
            'Serbian',
            '&#1057;&#1088;&#1087;&#1089;&#1082;&#1080;',
            'sr|serbian',
            'sr_YU',
        ],
        'sv' => [
            'sv',
            'Swedish',
            'Svenska',
            'sv|swedish',
            'sv_SE',
        ],
        'ta' => [
            'ta',
            'Tamil',
            'தமிழ்',
            'ta|tamil',
            'ta_IN',
        ],
        'te' => [
            'te',
            'Telugu',
            'తెలుగు',
            'te|telugu',
            'te_IN',
        ],
        'th' => [
            'th',
            'Thai',
            '&#3616;&#3634;&#3625;&#3634;&#3652;&#3607;&#3618;',
            'th|thai',
            'th_TH',
        ],
        'tk' => [
            'tk',
            'Turkmen',
            'Türkmençe',
            'tk|turkmen',
            '',
        ],
        'tr' => [
            'tr',
            'Turkish',
            'T&uuml;rk&ccedil;e',
            'tr|turkish',
            'tr_TR',
        ],
        'tt' => [
            'tt',
            'Tatarish',
            'Tatar&ccedil;a',
            'tt|tatarish',
            '',
        ],
        'ug' => [
            'ug',
            'Uyghur',
            'ئۇيغۇرچە',
            'ug|uyghur',
            '',
        ],
        'uk' => [
            'uk',
            'Ukrainian',
            '&#1059;&#1082;&#1088;&#1072;&#1111;&#1085;&#1089;&#1100;&#1082;&#1072;',
            'uk|ukrainian',
            'uk_UA',
        ],
        'ur' => [
            'ur',
            'Urdu',
            'اُردوُ',
            'ur|urdu',
            'ur_PK',
        ],
        'uz@latin' => [
            'uz@latin',
            'Uzbek (latin)',
            'O&lsquo;zbekcha',
            'uz[-_]lat|uz@latin|uzbek-latin',
            '',
        ],
        'uz' => [
            'uz',
            'Uzbek (cyrillic)',
            '&#1038;&#1079;&#1073;&#1077;&#1082;&#1095;&#1072;',
            'uz[-_]cyr|uz@cyrillic|uzbek-cyrillic',
            '',
        ],
        'vi' => [
            'vi',
            'Vietnamese',
            'Tiếng Việt',
            'vi|vietnamese',
            'vi_VN',
        ],
        'vls' => [
            'vls',
            'Flemish',
            'West-Vlams',
            'vls|flemish',
            '',
        ],
        'zh_tw' => [
            'zh_TW',
            'Chinese traditional',
            '&#20013;&#25991;',
            'zh[-_](tw|hk)|chinese traditional',
            'zh_TW',
        ],
        // only TW and HK use traditional Chinese while others (CN, SG, MY)
        // use simplified Chinese
        'zh_cn' => [
            'zh_CN',
            'Chinese simplified',
            '&#20013;&#25991;',
            'zh(?![-_](tw|hk))([-_][[:alpha:]]{2,3})?|chinese simplified',
            'zh_CN',
        ],
    ];

    private $_available_locales;

    private $_available_languages;

    private $_lang_failed_cfg;

    private $_lang_failed_cookie;

    private $_lang_failed_request;

    private static $instance;

    /**
     * Returns LanguageManager singleton.
     *
     * @return LanguageManager
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Returns list of available locales.
     *
     * @return array
     */
    public function listLocaleDir()
    {
        $result = ['en'];

        /* Check for existing directory */
        if (! is_dir(LOCALE_PATH)) {
            return $result;
        }

        /* Open the directory */
        $handle = @opendir(LOCALE_PATH);
        /* This can happen if the kit is English-only */
        if ($handle === false) {
            return $result;
        }

        /* Process all files */
        while (false !== ($file = readdir($handle))) {
            $path = LOCALE_PATH
                .'/'.$file
                .'/LC_MESSAGES/phpmyadmin.mo';
            if ($file != '.'
                && $file != '..'
                && @file_exists($path)
            ) {
                $result[] = $file;
            }
        }
        /* Close the handle */
        closedir($handle);

        return $result;
    }

    /**
     * Returns (cached) list of all available locales.
     *
     * @return array of strings
     */
    public function availableLocales()
    {
        if (! $this->_available_locales) {
            if (empty($GLOBALS['cfg']['FilterLanguages'])) {
                $this->_available_locales = $this->listLocaleDir();
            } else {
                $this->_available_locales = preg_grep(
                    '@'.$GLOBALS['cfg']['FilterLanguages'].'@',
                    $this->listLocaleDir()
                );
            }
        }

        return $this->_available_locales;
    }

    /**
     * Checks whether there are some languages available.
     *
     * @return bool
     */
    public function hasChoice()
    {
        return count($this->availableLanguages()) > 1;
    }

    /**
     * Returns (cached) list of all available languages.
     *
     * @return array of Language objects
     */
    public function availableLanguages()
    {
        if (! $this->_available_languages) {
            $this->_available_languages = [];

            foreach ($this->availableLocales() as $lang) {
                $lang = strtolower($lang);
                if (isset($this::$_language_data[$lang])) {
                    $data = $this::$_language_data[$lang];
                    $this->_available_languages[$lang] = new Language(
                        $data[0],
                        $data[1],
                        $data[2],
                        $data[3],
                        $data[4]
                    );
                } else {
                    $this->_available_languages[$lang] = new Language(
                        $lang,
                        ucfirst($lang),
                        ucfirst($lang),
                        $lang,
                        ''
                    );
                }
            }
        }

        return $this->_available_languages;
    }

    /**
     * Returns (cached) list of all available languages sorted
     * by name.
     *
     * @return array of Language objects
     */
    public function sortedLanguages()
    {
        $this->availableLanguages();
        uasort($this->_available_languages, function ($a, $b) {
            return $a->cmp($b);
        }
        );

        return $this->_available_languages;
    }

    /**
     * Return Language object for given code.
     *
     * @param string $code Language code
     *
     * @return object|false Language object or false on failure
     */
    public function getLanguage($code)
    {
        $code = strtolower($code);
        $langs = $this->availableLanguages();
        if (isset($langs[$code])) {
            return $langs[$code];
        }

        return false;
    }

    /**
     * Return currently active Language object.
     *
     * @return object Language object
     */
    public function getCurrentLanguage()
    {
        return $this->_available_languages[strtolower($GLOBALS['lang'])];
    }

    /**
     * Activates language based on configuration, user preferences or
     * browser.
     *
     * @return Language
     */
    public function selectLanguage()
    {
        // check forced language
        if (! empty($GLOBALS['PMA_Config']->get('Lang'))) {
            $lang = $this->getLanguage($GLOBALS['PMA_Config']->get('Lang'));
            if ($lang !== false) {
                return $lang;
            }
            $this->_lang_failed_cfg = true;
        }

        // Don't use REQUEST in following code as it might be confused by cookies
        // with same name. Check user requested language (POST)
        if (! empty($_POST['lang'])) {
            $lang = $this->getLanguage($_POST['lang']);
            if ($lang !== false) {
                return $lang;
            }
            $this->_lang_failed_request = true;
        }

        // check user requested language (GET)
        if (! empty($_GET['lang'])) {
            $lang = $this->getLanguage($_GET['lang']);
            if ($lang !== false) {
                return $lang;
            }
            $this->_lang_failed_request = true;
        }

        // check previous set language
        if (! empty($_COOKIE['pma_lang'])) {
            $lang = $this->getLanguage($_COOKIE['pma_lang']);
            if ($lang !== false) {
                return $lang;
            }
            $this->_lang_failed_cookie = true;
        }

        $langs = $this->availableLanguages();

        // try to find out user's language by checking its HTTP_ACCEPT_LANGUAGE variable;
        $accepted_languages = Core::getenv('HTTP_ACCEPT_LANGUAGE');
        if ($accepted_languages) {
            foreach (explode(',', $accepted_languages) as $header) {
                foreach ($langs as $language) {
                    if ($language->matchesAcceptLanguage($header)) {
                        return $language;
                    }
                }
            }
        }

        // try to find out user's language by checking its HTTP_USER_AGENT variable
        $user_agent = Core::getenv('HTTP_USER_AGENT');
        if (! empty($user_agent)) {
            foreach ($langs as $language) {
                if ($language->matchesUserAgent($user_agent)) {
                    return $language;
                }
            }
        }

        // Didn't catch any valid lang : we use the default settings
        if (isset($langs[$GLOBALS['PMA_Config']->get('DefaultLang')])) {
            return $langs[$GLOBALS['PMA_Config']->get('DefaultLang')];
        }

        // Fallback to English
        return $langs['en'];
    }

    /**
     * Displays warnings about invalid languages. This needs to be postponed
     * to show messages at time when language is initialized.
     *
     * @return void
     */
    public function showWarnings()
    {
        // now, that we have loaded the language strings we can send the errors
        if ($this->_lang_failed_cfg
            || $this->_lang_failed_cookie
            || $this->_lang_failed_request
        ) {
            trigger_error(
                __('Ignoring unsupported language code.'),
                E_USER_ERROR
            );
        }
    }

    /**
     * Returns HTML code for the language selector.
     *
     * @param bool $use_fieldset whether to use fieldset for selection
     * @param bool $show_doc     whether to show documentation links
     *
     * @return string
     */
    public function getSelectorDisplay($use_fieldset = false, $show_doc = true)
    {
        $_form_params = [
            'db' => $GLOBALS['db'],
            'table' => $GLOBALS['table'],
        ];

        // For non-English, display "Language" with emphasis because it's
        // not a proper word in the current language; we show it to help
        // people recognize the dialog
        $language_title = __('Language')
            .(__('Language') != 'Language' ? ' - <em>Language</em>' : '');
        if ($show_doc) {
            $language_title .= Util::showDocu('faq', 'faq7-2');
        }

        $available_languages = $this->sortedLanguages();

        return Template::get('select_lang')->render(
            [
                'language_title' => $language_title,
                'use_fieldset' => $use_fieldset,
                'available_languages' => $available_languages,
                '_form_params' => $_form_params,
            ]
        );
    }
}