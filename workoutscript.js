
document.addEventListener('DOMContentLoaded', () => {
    const equipmentContainer = document.getElementById('equipment-container');
    const exercisesContainer = document.getElementById('exercises-container');
    const modal = document.getElementById('video-modal');
    const video = document.getElementById('exercise-video');
    const closeButton = document.getElementById('close-button');
    const exerciseTitle = document.getElementById('exercise-title');
    const exerciseDescription = document.getElementById('exercise-description');
    const successMessage = document.getElementById('success-message');



    const profileIcon = document.getElementById('profile-icon');
    const dropdown = document.querySelector('.dropdown-content');

    profileIcon.addEventListener('click', function (event) {
        event.preventDefault(); // Prevent any default action
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Close the dropdown if the user clicks outside of it
    window.addEventListener('click', function (event) {
        if (!profileIcon.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });

    // Handle clicks on dropdown items
    dropdown.addEventListener('click', function (event) {
        if (event.target.tagName === 'A') {
            const url = event.target.getAttribute('href');
            window.location.href = url;
        }
    });




    const selectedEquipment = new Set();

    // Event listener for equipment selection
    equipmentContainer.addEventListener('click', (e) => {
        const target = e.target.closest('.equipment');
        if (target) {
            const instrument = target.dataset.instrument;
            if (selectedEquipment.has(instrument)) {
                selectedEquipment.delete(instrument);
                target.classList.remove('selected');
            } else {
                selectedEquipment.add(instrument);
                target.classList.add('selected');
            }
            loadExercises();
        }
    });

    // Event listener for exercise selection
    exercisesContainer.addEventListener('click', (e) => {
        const target = e.target.closest('.exercise-card');
        if (target) {
            const videoSrc = target.dataset.video;
            const description = target.dataset.description;
            const title = target.dataset.title;

            video.src = videoSrc;
            video.autoplay = true;
            video.loop = true;

            exerciseTitle.textContent = title;
            exerciseDescription.textContent = description;

            modal.style.display = 'block';
        }
    });

    // Event listener for closing the modal
    closeButton.addEventListener('click', () => {
        modal.style.display = 'none';
        video.pause();
    });

    // Event listener for closing the modal when clicking outside of it
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
            video.pause();
        }
    });

    function loadExercises() {
        // Dummy exercise data for demonstration

        const exercises = [
            // Bodyweight exercises
            {
                name: 'Alternating Lunge with Rotation',
                img: 'images/alternating-lunge-with-rotation.jpg',
                video: 'Videos/Body/alternating-lunge-with-rotation.WEBM',
                instruments: ['bodyweight'],
                description: 'Perform 3 sets of 12 reps on each side. This exercise targets the legs and core, improving balance and coordination.'
            },
            {
                name: 'Archer Pull Up',
                img: 'images/archer-pull-up.jpg',
                video: 'Videos/Body/archer-pull-up-fitness.WEBM',
                instruments: ['bodyweight'],
                description: 'Perform 3 sets of 5-8 reps. This exercise primarily targets the upper back and biceps, enhancing strength and muscle definition.'
            },
            {
                name: 'Basketball Shot Jump',
                img: 'images/basketball-shot-jump.jpg',
                video: 'Videos/Body/basketball-shot-jump.WEBM',
                instruments: ['bodyweight'],
                description: 'Perform 3 sets of 15 reps. This plyometric exercise targets the legs and cardiovascular system, improving explosive power and agility.'
            },
            {
                name: 'Bending Arms',
                img: 'images/bending-arms.jpg',
                video: 'Videos/Body/bending-arms.WEBM',
                instruments: ['bodyweight'],
                description: 'Perform 3 sets of 12 reps. This exercise focuses on the biceps and shoulders, enhancing arm strength and flexibility.'
            },
            {
                name: 'Bouncing Inner Thigh Tap',
                img: 'images/bouncing-inner-thigh-tap.jpg',
                video: 'Videos/Body/bouncing-inner-thigh-tap.WEBM',
                instruments: ['bodyweight'],
                description: 'Perform 3 sets of 20 reps. This exercise targets the inner thighs and core, promoting leg strength and stability.'
            },
            {
                name: 'Diamond Push Up on Knees',
                img: 'images/diamond-push-up-on-knees.jpg',
                video: 'Videos/Body/diamond-push-up-on-knees.WEBM',
                instruments: ['bodyweight'],
                description: 'Perform 3 sets of 10-12 reps. This modified push-up targets the triceps and chest, ideal for beginners building upper body strength.'
            },
            {
                name: 'Extended Side Angle',
                img: 'images/extended-side-angle.jpg',
                video: 'Videos/Body/extended-side-angle.WEBM',
                instruments: ['bodyweight'],
                description: 'Hold for 3 sets of 30 seconds on each side. This yoga pose stretches the legs, hips, and torso, enhancing flexibility and balance.'
            },
            {
                name: 'Female Leg Downward Dog',
                img: 'images/female-leg-downward-dog.jpg',
                video: 'Videos/Body/female-leg-downward-dog.WEBM',
                instruments: ['bodyweight'],
                description: 'Hold for 3 sets of 30 seconds on each leg. This pose targets the hamstrings, calves, and shoulders, improving flexibility and strength.'
            },
            {
                name: 'Front Plank',
                img: 'images/front-plank.jpg',
                video: 'Videos/Body/front-plank.WEBM',
                instruments: ['bodyweight'],
                description: 'Hold for 3 sets of 60 seconds. This exercise targets the core, enhancing stability and strength in the abdominals and lower back.'
            },
            {
                name: 'Oblique Crunch Exercise on Abs',
                img: 'images/oblique-crunch-exercise-on-abs.jpg',
                video: 'Videos/Body/oblique-crunch-exercise-on-abs.WEBM',
                instruments: ['bodyweight'],
                description: 'Perform 3 sets of 15 reps on each side. This exercise targets the obliques, improving core strength and waist definition.'
            },
            {
                name: 'Push Up on Forearms',
                img: 'images/push-up-on-forearms.jpg',
                video: 'Videos/Body/push-up-on-forearms.WEBM',
                instruments: ['bodyweight'],
                description: 'Perform 3 sets of 12 reps. This variation of the push-up targets the chest and triceps while minimizing wrist strain.'
            },
            {
                name: 'Reverse Hyper on Flat Bench Hips',
                img: 'images/reverse-hyper-on-flat-bench-hips.jpg',
                video: 'Videos/Body/reverse-hyper-on-flat-bench-hips.WEBM',
                instruments: ['bodyweight'],
                description: 'Perform 3 sets of 15 reps. This exercise targets the lower back and glutes, enhancing posterior chain strength.'
            },
            {
                name: 'Superman Pulls',
                img: 'images/superman-pulls.jpg',
                video: 'Videos/Body/superman-pulls.WEBM',
                instruments: ['bodyweight'],
                description: 'Perform 3 sets of 12 reps. This exercise targets the lower back and shoulders, promoting overall back strength.'
            },
            {
                name: 'Twist Hip Lift Hips',
                img: 'images/twist-hip-lift-hips.jpg',
                video: 'Videos/Body/twist-hip-lift-hips.WEBM',
                instruments: ['bodyweight'],
                description: 'Perform 3 sets of 15 reps. This exercise targets the hips and obliques, improving core strength and hip flexibility.'
            },
            {
                name: 'Woman Single Leg Raise Plank',
                img: 'images/woman-single-leg-raise-plank.jpg',
                video: 'Videos/Body/woman-single-leg-raise-plank.WEBM',
                instruments: ['bodyweight'],
                description: 'Hold for 3 sets of 30 seconds on each leg. This exercise targets the core and glutes, enhancing balance and stability.'
            },

            // Dumbbell exercises
            { name: 'Dynamic Shoulder Raise', img: 'images/dumbbell-seated-bent-arm-lateral.jpg', video: 'Videos/dumbbell/dumbbell-seated-bent-arm-lateral.WEBM', instruments: ['dumbbell'], description: 'Perform 3 sets of 12 reps daily. This exercise targets the deltoid muscles for stronger shoulders.' },
            { name: 'Triceps Toning Technique', img: 'images/dumbbell-tate-press-on-triceps.jpg', video: 'Videos/dumbbell/dumbbell-tate-press-on-triceps.WEBM', instruments: ['dumbbell'], description: 'Do 4 sets of 10 reps every day. This move focuses on sculpting the triceps for toned arms.' },
            { name: 'Lean & Lift', img: 'images/lifting-dumbbell-in-hand-to-lean.jpg', video: 'Videos/dumbbell/lifting-dumbbell-in-hand-to-lean.WEBM', instruments: ['dumbbell'], description: 'Complete 3 sets of 15 reps daily. This exercise engages the core and back muscles for better posture.' },
            { name: 'Chest Press Challenge', img: 'images/dumbbell-bench-press.jpg', video: 'Videos/dumbbell/dumbbell-bench-press.WEBM', instruments: ['dumbbell'], description: 'Perform 4 sets of 8 reps daily. Strengthen your chest muscles with this effective press.' },
            { name: 'Incline Front Raise', img: 'images/dumbbell-incline-front-raise.jpg', video: 'Videos/dumbbell/dumbbell-incline-front-raise.WEBM', instruments: ['dumbbell'], description: 'Do 3 sets of 12 reps daily. This exercise targets the front deltoids for a well-rounded shoulder workout.' },
            { name: 'Triceps Pronated Extension', img: 'images/dumbbell-lying-one-arm-pronated-triceps.jpg', video: 'Videos/dumbbell/dumbbell-lying-one-arm-pronated-triceps.WEBM', instruments: ['dumbbell'], description: 'Complete 4 sets of 10 reps daily. Strengthen and tone your triceps with this effective extension.' },
            { name: 'Floor Pullover', img: 'images/dumbbell-pullover-on-floor.jpg', video: 'Videos/dumbbell/dumbbell-pullover-on-floor.WEBM', instruments: ['dumbbell'], description: 'Perform 3 sets of 12 reps daily. This exercise targets the chest and back muscles for improved upper body strength.' },
            { name: 'Rear Deltoid Sculptor', img: 'images/dumbbell-rear.jpg', video: 'Videos/dumbbell/dumbbell-rear.WEBM', instruments: ['dumbbell'], description: 'Do 3 sets of 15 reps daily. Strengthen and define your rear deltoids with this effective exercise.' },
            { name: 'Rear Deltoid Raise', img: 'images/dumbbell-rear-delt.jpg', video: 'Videos/dumbbell/dumbbell-rear-delt.WEBM', instruments: ['dumbbell'], description: 'Complete 4 sets of 12 reps daily. This move targets the rear deltoids for improved shoulder stability.' },
            { name: 'Renegade Row Challenge', img: 'images/dumbbell-renegade-row.jpg', video: 'Videos/dumbbell/dumbbell-renegade-row.WEBM', instruments: ['dumbbell'], description: 'Perform 3 sets of 10 reps daily. Strengthen your core and back muscles with this challenging rowing exercise.' },
            { name: 'Bicep Builder', img: 'images/collapsing-on-the-floo.jpg', video: 'Videos/dumbbell/collapsing-on-the-floo.WEBM', instruments: ['dumbbell'], description: 'Do 4 sets of 8 reps daily. Sculpt and strengthen your biceps with this effective curl.' },
            { name: 'Hip Thrust Power-Up', img: 'images/resistance-band-hip-thrust.jpg', video: 'Videos/belt/resistance-band-hip-thrust.WEBM', instruments: ['belt'], description: 'Complete 3 sets of 15 reps daily. This exercise targets the glutes and hamstrings for improved lower body strength.' },
            { name: 'Machine Bench Press', img: 'images/Bench-Press.jpg', video: 'Videos/Machine/Bench-Press.WEBM', instruments: ['Machine'], description: 'Perform 4 sets of 8 reps daily. Strengthen your chest muscles with this effective machine press.' },
            { name: 'Cable Kneeling Triceps', img: 'images/cable-kneeling-triceps.jpg', video: 'Videos/Machine/cable-kneeling-triceps.WEBM', instruments: ['Machine'], description: 'Do 3 sets of 12 reps daily. Sculpt and tone your triceps with this cable exercise.' },
            { name: 'Machine Shoulder Press', img: 'images/cable-machine-shoulder.jpg', video: 'Videos/Machine/cable-machine-shoulder.WEBM', instruments: ['Machine'], description: 'Complete 4 sets of 10 reps daily. Strengthen your shoulder muscles with this effective machine press.' },
            { name: 'Cable Shoulder Press', img: 'images/cable-machine-shoulder-press.jpg', video: 'Videos/Machine/cable-machine-shoulder-press.WEBM', instruments: ['Machine'], description: 'Perform 3 sets of 12 reps daily. This exercise targets the deltoids for stronger shoulders.' },
            { name: 'Overhead Cable Triceps Extension', img: 'images/cable-rope-high-pulley-overhead-triceps.jpg', video: 'Videos/Machine/cable-rope-high-pulley-overhead-triceps.WEBM', instruments: ['Machine'], description: 'Do 4 sets of 10 reps daily. Sculpt and tone your triceps with this cable exercise.' },
            { name: 'Seated Cable Rows', img: 'images/cable-seated-on-floor-row.jpg', video: 'Videos/Machine/cable-seated-on-floor-row.WEBM', instruments: ['Machine'], description: 'Complete 3 sets of 12 reps daily. Strengthen your back muscles with this seated cable exercise.' },
            { name: 'Wide Grip Seated Cable Row', img: 'images/cable-seated-wide-grip.jpg', video: 'Videos/Machine/cable-seated-wide-grip.WEBM', instruments: ['Machine'], description: 'Perform 4 sets of 10 reps daily. Strengthen your back muscles with this wide grip seated cable row.' },
            { name: 'Straight Arm Cable Pulldown', img: 'images/cable-straight-arm-pulldown.jpg', video: 'Videos/Machine/cable-straight-arm-pulldown.WEBM', instruments: ['Machine'], description: 'Do 3 sets of 12 reps daily. This exercise targets the lats for improved back strength.' },
            { name: 'Hammer Strength Leg(Alternate Legs)', img: 'images/hammer-strength-leg-curl-alternate-legs.jpg', video: 'Videos/Machine/hammer-strength-leg-curl-alternate-legs.WEBM', instruments: ['Machine'], description: 'Complete 3 sets of 15 reps daily. Strengthen your hamstring muscles with this effective leg curl exercise.' },
            { name: 'Inverted Row (Bent Knees)', img: 'images/inverted-row-bent-knees.jpg', video: 'Videos/Machine/inverted-row-bent-knees.WEBM', instruments: ['Machine'], description: 'Perform 4 sets of 10 reps daily. Strengthen your back muscles with this inverted row exercise.' },
            { name: 'Normal Grip Lat Pulldown', img: 'images/lat-pull-down-normal-grip.jpg', video: 'Videos/Machine/lat-pull-down-normal-grip.WEBM', instruments: ['Machine'], description: 'Do 3 sets of 12 reps daily. This exercise targets the lats for improved back strength.' },
            { name: 'Leverage Machine Lateral Raise', img: 'images/Bleverage-machine-lateral-raise-plate.jpg', video: 'Videos/Machine/leverage-machine-lateral-raise-plate.WEBM', instruments: ['Machine'], description: 'Complete 4 sets of 10 reps daily. Strengthen your deltoid muscles with this effective lateral raise.' },
            { name: 'Wide Grip Leverage Machine Pulldown', img: 'images/leverage-machine-lateral-wide-pulldown.jpg', video: 'Videos/Machine/leverage-machine-lateral-wide-pulldown.WEBM', instruments: ['Machine'], description: 'Perform 3 sets of 12 reps daily. Strengthen your back muscles with this wide grip pulldown.' },
            { name: 'Reverse Grip Leverage Machine Pulldown', img: 'images/leverage-machine-reverse-grip.jpg', video: 'Videos/Machine/leverage-machine-reverse-grip.WEBM', instruments: ['Machine'], description: 'Do 4 sets of 10 reps daily. This exercise targets the upper back and biceps.' },
            { name: 'Lever Lying Chest Press', img: 'images/lever-lying-chest-press-plate.jpg', video: 'Videos/Machine/lever-lying-chest-press-plate.WEBM', instruments: ['Machine'], description: 'Complete 3 sets of 12 reps daily. Strengthen your chest muscles with this lever lying press.' },
            { name: 'Reverse Grip Lat Pulldown', img: 'images/reverse-grip-lat-pull-down.jpg', video: 'Videos/Machine/reverse-grip-lat-pull-down.WEBM', instruments: ['Machine'], description: 'Perform 4 sets of 10 reps daily. Strengthen your upper back and biceps with this pulldown exercise.' },
            { name: 'Seated Cable Row', img: 'images/seated-cable.jpg', video: 'Videos/Machine/seated-cable.WEBM', instruments: ['Machine'], description: 'Do 3 sets of 12 reps daily. Strengthen your back muscles with this seated cable row exercise.' },
            { name: 'Smith Machine Bent-Over Row', img: 'images/smith-machine-bent-over-row.jpg', video: 'Videos/Machine/smith-machine-bent-over-row.WEBM', instruments: ['Machine'], description: 'Complete 4 sets of 10 reps daily. Strengthen your back muscles with this bent-over row exercise.' },
            { name: 'Smith Machine Hip Thrust', img: 'images/smith-machine-hip-thrust.jpg', video: 'Videos/Machine/smith-machine-hip-thrust.WEBM', instruments: ['Machine'], description: 'Perform 3 sets of 15 reps daily. Strengthen your glutes and hamstrings with this effective hip thrust exercise.' },
            { name: 'Standing Lat Cable Pulldown', img: 'images/standing-lat-cable.jpg', video: 'Videos/Machine/standing-lat-cable.WEBM', instruments: ['Machine'], description: 'Do 4 sets of 10 reps daily. Strengthen your back muscles with this standing lat pulldown.' },
            { name: 'Weighted Russian Twist', img: 'images/weighted-russian-twist.jpg', video: 'Videos/Plates/weighted-russian-twist.WEBM', instruments: ['Plates'], description: 'Complete 3 sets of 15 reps daily. This exercise targets the obliques and core for improved stability.' },
            { name: 'Barbell Bench Squat', img: 'images/barbell-bench-squat.jpg', video: 'Videos/barbell/barbell-bench-squat.WEBM', instruments: ['barbell'], description: 'Perform 4 sets of 8 reps daily. Strengthen your lower body with this compound squat exercise.' },
            { name: 'Barbell Clean and Jerk', img: 'images/barbell-clean-and-jerk.jpg', video: 'Videos/barbell/barbell-clean-and-jerk.WEBM', instruments: ['barbell'], description: 'Do 3 sets of 5 reps daily. This exercise improves full-body strength and power.' },
            { name: 'Barbell Decline Triceps Extension', img: 'images/barbell-decline-triceps-.jpg', video: 'Videos/barbell/barbell-decline-triceps-.WEBM', instruments: ['barbell'], description: 'Complete 4 sets of 10 reps daily. Sculpt and tone your triceps with this effective extension.' },
            { name: 'Barbell Power Jerk', img: 'images/barbell-power-jerk-powerlifting.jpg', video: 'Videos/barbell/barbell-power-jerk-powerlifting.WEBM', instruments: ['barbell'], description: 'Perform 3 sets of 5 reps daily. This exercise improves explosive power and strength.' },
            { name: 'Barbell Single Leg Split Squat', img: 'images/barbell-single-leg-split-squat.jpg', video: 'Videos/barbell/barbell-single-leg-split-squat.WEBM', instruments: ['barbell'], description: 'Do 3 sets of 12 reps daily on each leg. Strengthen your legs and improve balance with this unilateral squat variation.' },
            { name: 'Barbell Split Squat', img: 'images/barbell-split-squat-female-d.jpg', video: 'Videos/barbell/barbell-split-squat-female-d.WEBM', instruments: ['barbell'], description: 'Complete 3 sets of 12 reps daily on each leg. This exercise targets the quads, hamstrings, and glutes for improved lower body strength.' },
            { name: 'Cluster Powerlifting', img: 'images/cluster-powerlifting.jpg', video: 'Videos/barbell/cluster-powerlifting.WEBM', instruments: ['barbell'], description: 'Perform 5 sets of 3 reps daily. This powerlifting technique helps improve strength and explosiveness.' },
            { name: 'Barbell Concentration Curl', img: 'images/barbell-standing-concentration-curl.jpg', video: 'Videos/barbell/barbell-standing-concentration-curl.WEBM', instruments: ['barbell'], description: 'Do 4 sets of 10 reps daily. Focus on your biceps with this concentrated curl exercise.' },
            { name: 'Barbell Sumo Deadlift', img: 'images/barbell-sumo-deadlift.jpg', video: 'Videos/barbell/barbell-sumo-deadlift.WEBM', instruments: ['barbell'], description: 'Complete 3 sets of 8 reps daily. Strengthen your glutes, hamstrings, and lower back with this deadlift variation.' },
            { name: 'Bent Leg Kickback', img: 'images/bent-leg-kickback-kneeling-hips.jpg', video: 'Videos/barbell/bent-leg-kickback-kneeling-hips.WEBM', instruments: ['barbell'], description: 'Perform 3 sets of 15 reps daily on each leg. This exercise targets the glutes for improved lower body strength.' },
            { name: 'Wide Grip Upright Row', img: 'images/barbell-barbell-wide-grip-upright.jpg', video: 'Videos/barbell/barbell-wide-grip-upright.WEBM', instruments: ['barbell'], description: 'Do 3 sets of 12 reps daily. Strengthen your shoulders and upper back with this upright row exercise.' },
        ];

        exercisesContainer.innerHTML = '';

        exercises.forEach(exercise => {
            if (exercise.instruments.some(instrument => selectedEquipment.has(instrument))) {
                const exerciseCard = document.createElement('div');
                exerciseCard.classList.add('exercise-card');
                exerciseCard.dataset.video = exercise.video;
                exerciseCard.dataset.description = exercise.description;
                exerciseCard.dataset.title = exercise.name;
                exerciseCard.innerHTML = `
                    <from action="" method='post'>
                    <span>${exercise.name}</span>
                    <input type="submit" class="add-button" value="Add">
                    </form>
                `;
                exerciseCard.querySelector('.add-button').addEventListener('click', showSuccessMessage);
                exercisesContainer.appendChild(exerciseCard);
            }
        });
    }

    // Function to display a success message when an exercise is added
    function showSuccessMessage() {
        successMessage.style.display = 'block';
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 2000);
    }
});