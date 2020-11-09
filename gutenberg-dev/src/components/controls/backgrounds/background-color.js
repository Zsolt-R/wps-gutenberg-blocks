import { __ } from '@wordpress/i18n';
import {CustomColorSelect} from '../custom-color-select';

export const BackgroundColorOptions = ( props ) => {	

	const { atts, setAttributes } = props;

	return (
		<CustomColorSelect
			title={ __( 'Background Color' ) }
			colors={wpsCustomizer.backgroundColors}
			value={atts.backgroundColor}
			reset={	() => {setAttributes({backgroundColor:''})} }
			callback={(value)=>{
				setAttributes({backgroundColor:value.id});							
			}}
		/>
	);
};