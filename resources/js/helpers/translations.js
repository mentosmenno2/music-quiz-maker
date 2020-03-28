
/**
 * Translate the given key.
 * @see https://pineco.de/using-laravels-localization-js/
 */
function trans(key, replace = {})
{
	let translation = null;
	let translationNotFound = true;

	try {
		translation = key.split('.').reduce((t, i) => t[i] || null, window._translations[window._locale].php);

		if (translation) {
			translationNotFound = false;
		}
	} catch (e) {
		translation = key;
	}

	if (translationNotFound) {
		translation = window._translations[window._locale]['json'][key] ? window._translations[window._locale]['json'][key] : key;
	}

	_.forEach(replace, (value, key) => {
		translation = translation.replace(':' + key, value);
	})

	return translation;
}

function __(key, replace = {}) {
	return trans(key, replace);
}

function lang(key, replace = {}) {
	return trans(key, replace);
}
