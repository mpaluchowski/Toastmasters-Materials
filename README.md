Toastmasters-Materials
======================

A simple application for Toastmasters clubs to make:

* materials, like digital books, flyers, forms, and
* the list of club members with their contact details

available to all current club members in a safe, but easily accessible manner.

Security
--------

Every club member receives a unique URL to access the repository and doesn't need to log in or keep a separate username/password. When a member leaves the club, his or her account can be simply removed, together with the URL.

Materials Storage
-----------------

All materials are stored in subfolders of the /data/ folder. To add new materials, simply create:

1. a subfolder of /data/ to create a group of materials (ie. the Better Speaker Series),
1. a subfolder of the abovementioned folder to collect all files related to a single issue (ie. the manual and slides, both in separate files)
1. add a `thumb.gif` file with the thumbnail to illustrate the material.

The list of files is cached for performance reasons. To reset the cache, enter the application (with your unique URL), adding the query string parameter `reset=true`, ie:

```http://example.org/123456/?reset=true```
