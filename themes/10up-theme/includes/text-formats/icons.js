export const GradientIcon = () => {
	return (
		<svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 40 40">
			<defs>
				<linearGradient
					id="background-gradient"
					x1="7.5"
					x2="32.5"
					y1="7.5"
					y2="32.5"
					gradientUnits="userSpaceOnUse"
				>
					<stop offset="0" stopColor="#1565c0" />
					<stop offset="1" stopColor="#b92b27" />
				</linearGradient>
			</defs>
			<rect width="30" height="30" x="5" y="5" fill="currentColor" rx="15" />
			<rect
				width="25"
				height="25"
				x="7.5"
				y="7.5"
				fill="url(#background-gradient)"
				rx="12.5"
			/>
		</svg>
	);
};
