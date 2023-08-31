<script>
    window.addEventListener('load', initialize);

    function initialize() {
        const input = document.getElementById('autocomplete');
        const options = {
            componentRestrictions: {
                country: 'us'
            }
        };
        const autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', function () {
            const place = autocomplete.getPlace();
            const request = {
                placeId: place.place_id,
                fields: ['address_components']
            };
            const service = new google.maps.places.PlacesService(document.createElement('div'));
            service.getDetails(request, function (result, status) {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    const city = getAddressComponent(result, /locality/i);
                    $('#city').val(city);
                    @this.set('city', city);

                    const state = getAddressComponent(result, /administrative_area_level_1/i);
                    $('#state').val(state);
                    @this.set('state', state);

                    const stateAbbreviation = getStateAbbreviation(result);
                    @this.set('stateCode', stateAbbreviation);

                    const zip = getAddressComponent(result, /postal_code/i);
                    $('#zip').val(zip);
                    @this.set('zip', zip);

                    @this.set('address', input.value);
                    $('#country').val(1);
                    @this.set('country',1)

                }
            });
        });
    }

    function getAddressComponent(place, regex) {
        for (let i = 0; i < place.address_components.length; i++) {
            const component = place.address_components[i];
            if (regex.test(component.types)) {
                return component.long_name;
            }
        }
        return '';
    }

    function getStateAbbreviation(place) {
        for (let i = 0; i < place.address_components.length; i++) {
            const component = place.address_components[i];
            if (component.types.includes('administrative_area_level_1')) {
                return component.short_name; // Use short_name for state abbreviation
            }
        }
        return '';
    }
</script>
