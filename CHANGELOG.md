# Changelog

All Notable changes to `trello-php` will be documented in this file

## 0.5.3 - 2018-03-28

### Added
- Nothing

### Deprecated
- Nothing

### Fixed
- Update updateCardCustomField method to use send request as JSON with body

### Removed
- Nothing

### Security
- Nothing

## 0.5.2 - 2018-03-26

### Added
- Nothing

### Deprecated
- Nothing

### Fixed
- Update path mapping for updateCardCustomField method

### Removed
- Nothing

### Security
- Nothing

## 0.5.1 - 2018-03-26

### Added
- Added support for getting a custom fields for a given card

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing

## 0.5.0 - 2018-03-23

### Added
- Added support for custom fields - https://developers.trello.com/docs/getting-started-custom-fields

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing

## 0.4.1 - 2017-03-22

### Added
- Nothing

### Deprecated
- Nothing

### Fixed
- HTTP client now omits multipart request option when multipart resources are not present - thanks @dragonee

### Removed
- Nothing

### Security
- Nothing

## 0.4.0 - 2016-09-23

### Added
- Add support for HTTP proxy configuration.

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing

## 0.3.6 - 2015-10-26

### Added
- Add support for RequestExceptions that do not have a Response object.

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing

## 0.3.5 - 2015-10-19

### Added
- Update Http client to handle file upload successfully.

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing

## 0.3.4 - 2015-10-05

### Added
- Add parameters to all Http methods. "Despite using POST and PUT, the Trello API actually expects the values to be in the query string rather than in the request body."
- Improve thrown exception to check if response body is valid json.

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing

## 0.3.3 - 2015-09-22

### Added
- Nothing

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Remove `makeQuery` method from `Client`

### Security
- Nothing

## 0.3.2 - 2015-09-22

### Added
- Add parameters to GET and DELETE Http methods

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing

## 0.3.1 - 2015-09-11

### Added
- Add temporary credentials support

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing

## 0.3.0 - 2015-09-03

### Added
- Central configuration object
- Authorization support to assist with OAuth1 auth flow
- Example code for OAuth1 auth flow
- Improved documentation for getting started

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing

## 0.2.1 - 2015-08-06

### Added
- Dynamic method implementation (faster execution)

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Superflous traits (extra code)

### Security
- Nothing

## 0.2.0 - 2015-08-04

### Added
- New client api
- Complete client api documentation
- 100% test code coverage
- PSR 7 compatbility

### Deprecated
- Nothing

### Fixed
- Nothing

### Removed
- Nothing

### Security
- Nothing
