<?php

// 获取当前登录用户
if (! function_exists('auth_user')) {
    /**
     * Get the auth_user.
     *
     * @return mixed
     */
    function auth_user()
    {
        return app('Dingo\Api\Auth\Auth')->user();
    }
}

if (! function_exists('dingo_route')) {
    /**
     * 根据别名获得url.
     *
     * @param string $version
     * @param string $name
     * @param string $params
     *
     * @return string
     */
    function dingo_route($version, $name, $params = [])
    {
        return app('Dingo\Api\Routing\UrlGenerator')
            ->version($version)
            ->route($name, $params);
    }
}

if (! function_exists('trans')) {
    /**
     * Translate the given message.
     *
     * @param string $id
     * @param array  $parameters
     * @param string $domain
     * @param string $locale
     *
     * @return string
     */
    function trans($id = null, $parameters = [], $domain = 'messages', $locale = null)
    {
        if (is_null($id)) {
            return app('translator');
        }

        return app('translator')->trans($id, $parameters, $domain, $locale);
    }
}

if (! function_exists('str_random')) {
	function str_random($length = 16)
	{
		$string = '';
		
		while (($len = strlen($string)) < $length) {
			$size = $length - $len;
			
			$bytes = random_bytes($size);
			
			$string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
		}
		
		return $string;
	}
}

if (! function_exists('public_path')) {
	//public 目录
	function public_path()
	{
		return app()->make('path').'/../public/';
	}
}
