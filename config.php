<?php
/*
* MultiDomains Configuration
*
* Configuration is handled via the $domains array. Examples are below.
* Note: if a no configuration is given for a domain, WordPress defaults will be used.
* Typically you won't need to configure your primary domain, only additional domains.
*
* Arguments:
*   domain: Domain name or subdomain to match (required)
*   siteurl: Site URL (required)
*   home: Home URL (required; usually the same as siteurl)
*   blogname: Override default site name (optional)
*   blogdescription: Override default site description (optional)
*   template: Override default site template (optional)
*/

/* Minimal Example */
// $domains = array(
//   array(
//     'domain' => 'myalternatedomain.com',
//     'siteurl' => 'http://myalternatedomain.com',
//     'home' => 'http://myalternatedomain.com'
//   )
// );

/* More Complex Example */
// $domains = array(
//   array(
//     'domain' => 'example1.com',
//     'siteurl' => 'http://example1.com',
//     'home' => 'http://example1.com'
//   ),
//   array(
//     'domain' => 'example2.com',
//     'siteurl' => 'http://example2.com',
//     'home' => 'http://example2.com',
//     'blogname' => 'Example 2'
//   ),
//   array(
//     'domain' => 'example3.com',
//     'siteurl' => 'http://example3.com',
//     'home' => 'http://example3.com',
//     'template' => 'twentyten',
//     'blogname' => 'I have a different name...',
//     'blogdescription' => '..and description'
//   )
// );
?>