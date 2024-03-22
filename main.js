const countries = document.getElementById('countries');
const capitalInput = document.getElementById('capital');

const capitals = {
  US: 'Washington D.C.',
  UK: 'London',
  CA: 'Ottawa',
};

countries.addEventListener('change', () => {
  const selectedCountry = countries.value;
  capitalInput.value = capitals[selectedCountry] || '';
});