<?php

declare(strict_types=1);

namespace BrowserSolver;

// Generated from the BrowserSolver OpenAPI document. Do not edit by hand.

/**
 * One method per documented BrowserSolver endpoint. Used by {@see Client}.
 */
trait Operations
{
    /**
     * @param array<string, mixed> $params
     */
    abstract protected function callOperation(string $name, array $params, ?RequestOptions $options): JsonResponse|BinaryResponse;

    /**
     * Jobs. Poll the status, progress (0–100) and result of a job started with is_async=true. Polling is free. Poll until status is terminal: CompletedJob, Error, NotFound or BadRequest.
     *
     * `GET /v1/jobs/{id}`
     *
     * @param array{id: string} $params
     *   - id (required): The job_id returned by an endpoint called with is_async=true.
     */
    public function jobs(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('jobs', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Stats. Infrastructure health for an engine or endpoint over the last hour. Not scoped to your account or tenant. Enabled per account: HTTP 403 means contact support to activate it.
     *
     * `GET /v1/stats`
     *
     * @param array{engine?: string, path?: string} $params
     *   - engine: API family to check, for example website. Provide at least engine or path.
     *   - path: Specific endpoint to check, for example /v1/website/screenshot. If you also pass engine, use an endpoint from that API.
     */
    public function stats(array $params = [], ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('stats', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Usage. Retrieve real-time usage statistics and credit balance for your BrowserSolver account.
     *
     * `GET /v1/usage`
     *
     * @param array{} $params
     */
    public function usage(array $params = [], ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('usage', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Website Antibot. Single-pass scan that names the bot-protection vendor in front of a URL so you can choose the right BrowserSolver fetch tier next. Credit cost: 1 credit per call.
     *
     * `GET /v1/website/antibot`
     *
     * @param array{query: string, timeout?: int|float, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - query (required): Full URL or bare domain to scan for bot-protection vendors.
     *   - timeout: Upper bound for waiting on the target HTTP response, expressed in seconds (defaults to 15).
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function websiteAntibot(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('website_antibot', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Website Crawler. Fast HTTP pull of public HTML with no browser session. Ideal when the first response already contains the content you need. Credit cost: 1 credit per call.
     *
     * `GET / POST /v1/website/crawler`
     *
     * @param array{query: string, allow_redirects?: bool, return_page_source?: bool, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - query (required): Public URL to retrieve with the Crawler tier (plain HTTP, no JavaScript). Include http:// or https://.
     *   - allow_redirects: Whether BrowserSolver should chase HTTP redirects for this fetch.
     *   - return_page_source: Choose between processed markup and the exact bytes from the origin.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function websiteCrawler(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('website_crawler', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Website Rendering. Run a managed browser session against a public URL and collect the HTML after client-side scripts finish. Prefer Crawler for static markup; escalate to WebUnlocker on approved hosts when challenges persist. Credit cost: 2 credits per call.
     *
     * `GET /v1/website/rendering`
     *
     * @param array{query: string, wait_in_seconds?: int|float, wait_for?: string, block_ads?: bool, timeout?: int|float, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - query (required): Public URL to load inside BrowserSolver's headless browser. Include http:// or https://.
     *   - wait_in_seconds: Extra pause, in seconds, after the page load event before BrowserSolver returns HTML. Helpful when widgets animate or hydrate late.
     *   - wait_for: CSS or XPath selector that must appear in the DOM before HTML is returned. The managed browser waits until the node exists (or until timeout).
     *   - block_ads: Skip ad-network requests while the page renders.
     *   - timeout: Hard ceiling, in seconds, for the render session. When reached, BrowserSolver returns whatever HTML is available.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function websiteRendering(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('website_rendering', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Website Screenshot. Turn any public URL into a PNG, JPEG, WebP, or PDF asset rendered by BrowserSolver. No local Chromium fleet to operate. Credit cost: 2 credits per call.
     *
     * `GET / POST /v1/website/screenshot`
     *
     * @param array{url: string, format?: string, device?: string, full_page?: bool, full_page_scroll?: bool, full_page_scroll_duration?: int|float, viewport_width?: int|float, viewport_height?: int|float, scale_factor?: int|float, image_quality?: string, selector?: string, cache?: bool, cache_ttl?: int|float, remove_selectors?: string, remove_cookie_banners?: bool, remove_ads?: bool, block_resources?: string, block_urls?: string, delay?: int|float, wait_until?: list<string>, wait_for_selector?: string, proxy?: string, s3_secret_key?: string, s3_access_key_id?: string, s3_bucket?: string, s3_object_key?: string, s3_region?: string, storage_endpoint?: string, s3_url?: bool, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - url (required): Page address to render into an image or PDF. Must include a protocol.
     *   - format: File type returned in the response body.
     *   - device: Swap the desktop viewport for a preset handset or tablet fingerprint.
     *   - full_page: Extend the capture beyond the viewport so the entire scrollable document is included.
     *   - full_page_scroll: Drive a scroll pass first so deferred content mounts before a tall capture.
     *   - full_page_scroll_duration: Milliseconds spent scrolling prior to a full-height capture.
     *   - viewport_width: Width of the synthetic desktop window, in pixels.
     *   - viewport_height: Height of the synthetic desktop window, in pixels.
     *   - scale_factor: Pixel density multiplier. Raise it for retina-quality output; files grow accordingly.
     *   - image_quality: Lossy compression level for soft formats.
     *   - selector: Limit the shot to one DOM node matched by this CSS selector.
     *   - cache: Serve a stored capture on repeat requests when caching is enabled.
     *   - cache_ttl: Lifetime of cached captures in seconds.
     *   - remove_selectors: Hide matching CSS selectors (modals, promo bars, etc.) before shooting.
     *   - remove_cookie_banners: Best-effort removal of cookie consent layers before capture.
     *   - remove_ads: Best-effort stripping of ad slots before capture.
     *   - block_resources: Resource kinds to discard during load, as a comma list (example: image,stylesheet,font).
     *   - block_urls: Substring patterns that should never be fetched (example: analytics,tracking,advertisement). Hosts, paths, or fragments such as .example.com/ work.
     *   - delay: Additional settle time in seconds after the readiness event.
     *   - wait_until: Which browser lifecycle event marks the page ready.
     *   - wait_for_selector: Hold capture until this CSS node is present.
     *   - proxy: Route the browser through an intermediate proxy.
     *   - s3_secret_key: Secret key used to authenticate uploads.
     *   - s3_access_key_id: Access key used to authenticate uploads.
     *   - s3_bucket: Destination bucket for the binary asset.
     *   - s3_object_key: Key under which the object is stored (generated automatically if blank).
     *   - s3_region: Cloud region of the bucket.
     *   - storage_endpoint: Override the default AWS endpoint for S3-compatible backends. Leave blank for AWS. R2 example: https://<accountId>.r2.cloudflarestorage.com.
     *   - s3_url: Upload the binary and include the public object URL in the API response.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function websiteScreenshot(array $params, ?RequestOptions $options = null): JsonResponse|BinaryResponse
    {
        return $this->callOperation('website_screenshot', $params, $options);
    }

    /**
     * Website Technology. Map CMS, frameworks, analytics, CDN, and security tooling exposed by a public URL. Choose simple lists or expert metadata with confidence scores. Credit cost: 1 credit per call.
     *
     * `GET / POST /v1/website/technology`
     *
     * @param array{query: string, mode?: string, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - query (required): Public URL to fingerprint for CMS, frameworks, analytics, CDN, and security tooling. Include http:// or https://.
     *   - mode: How much detail to include in the stack report.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function websiteTechnology(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('website_technology', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }

    /**
     * Website WebUnlocker. BrowserSolver's highest HTML fetch tier for retail and marketplace hosts on your account whitelist. Solves persistent bot challenges that still block Rendering. Credit cost: 3 credits per call.
     *
     * `GET / POST /v1/website/webunlocker`
     *
     * @param array{query: string, allow_redirects?: bool, return_page_source?: bool, fields?: string, is_async?: bool, soft_fail?: bool} $params
     *   - query (required): Public URL to fetch with the WebUnlocker tier. Include http:// or https://. The hostname must be on your BrowserSolver whitelist.
     *   - allow_redirects: Whether the unlock session should chase HTTP redirects.
     *   - return_page_source: Choose between processed markup and the exact post-unlock source.
     *   - fields: Comma-separated list of fields to keep in the response, with dot notation for nested fields (e.g. name,location.city). Does not change the credit cost.
     *   - is_async: Process the request asynchronously: the response is a job_id to poll on /v1/jobs/{id} (see waitForJob).
     *   - soft_fail: Return HTTP 200 even when an error occurs; the error is then in the response body.
     */
    public function websiteWebunlocker(array $params, ?RequestOptions $options = null): JsonResponse
    {
        $response = $this->callOperation('website_webunlocker', $params, $options);
        \assert($response instanceof JsonResponse);

        return $response;
    }
}
