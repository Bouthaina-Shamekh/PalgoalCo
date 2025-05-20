<?php
namespace App\Services;

use GuzzleHttp\Client;

class ProvisioningService
{
    protected Client $http;

    public function __construct()
    {
        // استخدم URL مُجمّع مع المنفذ من config/services.php
        $baseUrl = rtrim(config('services.whm.url'), '/');
        $token   = config('services.whm.token');
        $username   = config('services.whm.token');

        $this->http = new Client([
            'base_uri' => $baseUrl . '/',  // مثال: https://server.palgoals.com:2087/
            'verify'   => false,           // تعطيل التحقق من SSL (لبيئة الاختبار)
            'headers'  => [
                // يجب تمرير قيمة "root:TOKEN" في متغير CPANEL_TOKEN أو يمكنك إضافة مفتاح user في config
                'Authorization' => "WHM {$username}:{$token}",
            ],
        ]);
    }

    /**
     * تنشئ حساب استضافة جديد في cPanel/WHM
     *
     * @param  string  $domain
     * @param  string  $username
     * @param  string  $password
     * @param  string  $plan    اسم الباكج (ابحث عنه في WHM > Packages)
     * @return array  استجابة API مفككة إلى مصفوفة
     */
    public function createAccount(string $domain, string $username, string $password, string $plan): array
    {
        $response = $this->http->get('json-api/createacct', [
            'query' => [
                'api.version' => 1,
                'username'    => $username,
                'domain'      => $domain,
                'password'    => $password,
                'plan'        => $plan,
            ],
        ]);

        // فك JSON للإخراج
        return json_decode((string) $response->getBody(), true);
    }
}
